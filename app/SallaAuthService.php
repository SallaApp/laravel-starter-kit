<?php

namespace App;

use App\Models\User;
use Illuminate\Support\Traits\ForwardsCalls;
use League\OAuth2\Client\Token\AccessToken;
use Salla\OAuth2\Client\Provider\Salla;
use Salla\OAuth2\Client\Provider\SallaUser;

/**
 * @mixin Salla
 */
class SallaAuthService
{
    use ForwardsCalls;

    /**
     * @var Salla
     */
    protected $provider;
    /**
     * @var AccessToken
     */
    protected $access_token;

    public function __construct()
    {
        $this->provider = new Salla([
            'clientId'     => config('services.salla.client_id'), // The client ID assigned to you by Salla
            'clientSecret' => config('services.salla.client_secret'), // The client password assigned to you by Salla
            'redirectUri'  => route('oauth.callback'), // the url for current page in your service
        ]);
    }

    public function forUser(User $user)
    {
        $this->setAccessToken($user->token->toArray());

        return $this;
    }

    /**
     * @return Salla
     */
    public function getProvider(): Salla
    {
        return $this->provider;
    }

    /**
     * @param  array  $accessToken
     *
     * @return SallaAuthService
     */
    public function setAccessToken(array $accessToken)
    {
        $this->access_token = new AccessToken($accessToken);

        return $this;
    }

    /**
     * Get the details of store for the current token.
     *
     *  {
     *      "id": 181690847,
     *      "name": "eman elsbay",
     *      "email": "user@salla.sa",
     *      "mobile": "555454545",
     *      "role": "user",
     *      "created_at": "2018-04-28 17:46:25",
     *      "store": {
     *        "id": 633170215,
     *        "owner_id": 181690847,
     *        "owner_name": "eman elsbay",
     *        "username": "good-store",
     *        "name": "متجر الموضة",
     *        "avatar": "https://cdn.salla.sa/XrXj/g2aYPGNvafLy0TUxWiFn7OqPkKCJFkJQz4Pw8WsS.jpeg",
     *        "store_location": "26.989000873354787,49.62477639657287",
     *        "plan": "special",
     *        "status": "active",
     *        "created_at": "2019-04-28 17:46:25"
     *      }
     *    }
     * @return \League\OAuth2\Client\Provider\ResourceOwnerInterface|SallaUser
     */
    public function getStoreDetail()
    {
        return $this->provider->getResourceOwner($this->access_token);
    }

    /**
     * Get A new access token via refresh token.
     *
     * @return \League\OAuth2\Client\Token\AccessToken|\League\OAuth2\Client\Token\AccessTokenInterface
     * @throws \League\OAuth2\Client\Provider\Exception\IdentityProviderException
     */
    public function getNewAccessToken()
    {
        // let's request a new access token via refresh token.
        $token = $this->provider->getAccessToken('refresh_token', [
            'refresh_token' => auth()->user()->token->refresh_token
        ]);

        // lets update user tokens
        auth()->user()->token()->create([
            'access_token'  => $token->getToken(),
            'expires_in'    => $token->getExpires(),
            'refresh_token' => $token->getRefreshToken()
        ]);

        return $token;
    }

    /**
     * As shortcut to call the functions of provider class.
     *
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->forwardCallTo($this->provider, $name, $arguments);
    }
}
