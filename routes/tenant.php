<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Tenant\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Customize with tenant-specific pages & authentication.
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    // Tenant-specific welcome page
    Route::get('/', function () {
        return view('tenant.welcome');
    })->name('tenant.welcome');

    // Tenant login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('tenant.login');
    Route::post('/login', [LoginController::class, 'login'])->name('tenant.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('tenant.logout');

    // Example: Tenant dashboard (add after login logic if needed)
    // Route::get('/dashboard', [TenantDashboardController::class, 'index'])->name('tenant.dashboard');
});
