<?php

namespace App\Providers;

use App\Services\SallaAuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('salla.auth', SallaAuthService::class);
    }

    public function boot(): void
    {
        //
    }
}
