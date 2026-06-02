<?php

namespace App\Actions\App;

use App\Actions\BaseAction;
use App\Models\User;
use App\Services\SallaAuthService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use League\OAuth2\Client\Token\AccessToken;

/**
 * @property string $merchant
 * @property string $created_at
 * @property string $event
 * @property array $data
 */
class StoreAuthorize extends BaseAction
{
    public function handle(): void
    {
        /** @var SallaAuthService $service */
        $service = app('salla.auth');

        if (! $service->isEasyMode()) {
            return;
        }

        $storeDetails = $service->getResourceOwner(new AccessToken($this->data));

        $user = User::query()->firstOrCreate([
            'email' => $storeDetails->getEmail(),
        ], [
            'name' => $storeDetails->getStoreOwnerName(),
            'password' => Hash::make(Str::random()),
        ]);

        $user->token()->create([
            'merchant' => $storeDetails->getStoreId(),
            'access_token' => $this->data['access_token'],
            'expires_in' => $this->data['expires'],
            'refresh_token' => $this->data['refresh_token'],
        ]);
    }
}
