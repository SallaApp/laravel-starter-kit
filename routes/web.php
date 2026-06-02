<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/oauth/redirect', [OAuthController::class, 'redirect'])->name('oauth.redirect');
    Route::get('/oauth/callback', [OAuthController::class, 'callback'])->name('oauth.callback');
});

Route::post('/webhook', WebhookController::class)->name('webhook');
