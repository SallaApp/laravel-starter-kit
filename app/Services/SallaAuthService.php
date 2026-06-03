<?php

namespace App\Services;

use App\Models\OauthToken;
use App\Models\User;
use Illuminate\Support\Traits\ForwardsCalls;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;
use Salla\OAuth2\Client\Provider\Salla;
use Salla\OAuth2\Client\Provider\SallaUser;

/**
 * @mixin Salla
 */
class SallaAuthService
{
    use ForwardsCalls;

    protected Salla $provider;

    public OauthToken $token;

    public function __construct()
    {
        $this->provider = new Salla([
            'clientId' => config('services.salla.client_id'),
            'clientSecret' => config('services.salla.client_secret'),
            'redirectUri' => $this->isEasyMode() ? null : route('oauth.callback'),
        ]);
    }

    public function forUser(User $user): static
    {
        $this->token = $user->token;

        return $this;
    }

    public function getProvider(): Salla
    {
        return $this->provider;
    }

    /**
     * @return ResourceOwnerInterface|SallaUser
     */
    public function getStoreDetail(): ResourceOwnerInterface
    {
        return $this->provider->getResourceOwner(new AccessToken($this->token->toArray()));
    }

    /**
     * @throws IdentityProviderException
     */
    public function getNewAccessToken(): AccessToken
    {
        if (! $this->token->hasExpired()) {
            return new AccessToken($this->token->toArray());
        }

        $token = $this->provider->getAccessToken('refresh_token', [
            'refresh_token' => $this->token->refresh_token,
        ]);

        $this->token->update([
            'access_token' => $token->getToken(),
            'expires_in' => $token->getExpires(),
            'refresh_token' => $token->getRefreshToken(),
        ]);

        return $token;
    }

    public function request(string $method, string $url, array $options = []): mixed
    {
        $token = $this->getNewAccessToken();

        return $this->provider->fetchResource($method, $url, $token->getToken(), $options);
    }

    public function __call(string $name, array $arguments): mixed
    {
        return $this->forwardCallTo($this->provider, $name, $arguments);
    }

    public function isEasyMode(): bool
    {
        return config('services.salla.authorization_mode') === 'easy';
    }

    public function getResourceOwner(?AccessToken $token): ResourceOwnerInterface
    {
        return $this->provider->getResourceOwner($token ?: new AccessToken($this->token->toArray()));
    }
}
