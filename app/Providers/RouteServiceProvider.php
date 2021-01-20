<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $websiteNamespace = 'App\Http\Controllers';

    protected $dashboardNamespace = 'App\Http\Controllers\Dashboard';

    protected $apiNamespace = 'App\Http\Controllers\Api';

    public const HOME = '/';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {

        $this->mapWebRoutes();

        $this->mapDashboardRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware(['web', 'locale'])
            ->namespace($this->websiteNamespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapDashboardRoutes()
    {
        Route::prefix("dashboard")
            ->name('dashboard.')
            ->middleware(["web", "auth", "admin", "verified", "locale"])
            ->namespace($this->dashboardNamespace)
            ->group(base_path('routes/dashboard.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware(['localizeApi'])
            ->namespace($this->apiNamespace)
            ->group(base_path('routes/api.php'));
    }
}
