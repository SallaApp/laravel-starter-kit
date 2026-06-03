<?php

namespace App\Http\Controllers;

use App\Services\SallaAuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class DashboardController extends Controller
{
    public function __construct(
        private readonly SallaAuthService $salla,
    ) {}

    public function __invoke(): View|RedirectResponse
    {
        $products = [];
        $store = null;

        if (auth()->user()->token) {
            $this->salla->forUser(auth()->user());

            try {
                $this->salla->getNewAccessToken();
            } catch (IdentityProviderException) {
                return redirect()->route('oauth.redirect');
            }

            $store = $this->salla->getStoreDetail();
            $products = $this->salla->request('GET', 'https://api.salla.dev/admin/v2/products', [
                'headers' => ['User-Agent' => 'Salla-Laravel-Starter-Kit/1.0'],
            ])['data'];
        }

        return view('dashboard', [
            'products' => array_slice($products, 0, min(8, count($products))),
            'store' => $store,
        ]);
    }
}
