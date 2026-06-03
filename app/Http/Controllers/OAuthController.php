<?php

namespace App\Http\Controllers;

use App\Services\SallaAuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class OAuthController extends Controller
{
    public function __construct(
        private readonly SallaAuthService $service,
    ) {}

    public function redirect(): RedirectResponse
    {
        return redirect($this->service->getProvider()->getAuthorizationUrl());
    }

    public function callback(Request $request): RedirectResponse
    {
        abort_if($this->service->isEasyMode(), 401, 'The Authorization mode is not supported');

        try {
            $token = $this->service->getAccessToken('authorization_code', [
                'code' => $request->code ?? '',
            ]);

            $storeDetails = $this->service->getResourceOwner($token);

            $request->user()->token()->updateOrCreate([], [
                'merchant' => $storeDetails->getStoreId(),
                'access_token' => $token->getToken(),
                'expires_in' => $token->getExpires(),
                'refresh_token' => $token->getRefreshToken(),
            ]);

            return redirect('/dashboard');
        } catch (IdentityProviderException $e) {
            return redirect('/dashboard')->withStatus($e->getMessage());
        }
    }
}
