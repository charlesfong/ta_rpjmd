<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapKepaladaerahRoutes();

        $this->mapUmumRoutes();

        $this->mapAhliRoutes();

        $this->mapOpdRoutes();

        $this->mapBappedaRoutes();

        //
    }

    /**
     * Define the "bappeda" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapBappedaRoutes()
    {
        Route::group([
            'middleware' => ['web', 'bappeda', 'auth:bappeda'],
            'prefix' => 'bappeda',
            'as' => 'bappeda.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/bappeda.php');
        });
    }

    /**
     * Define the "opd" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapOpdRoutes()
    {
        Route::group([
            'middleware' => ['web', 'opd', 'auth:opd'],
            'prefix' => 'opd',
            'as' => 'opd.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/opd.php');
        });
    }

    /**
     * Define the "ahli" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAhliRoutes()
    {
        Route::group([
            'middleware' => ['web', 'ahli', 'auth:ahli'],
            'prefix' => 'ahli',
            'as' => 'ahli.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/ahli.php');
        });
    }

    /**
     * Define the "umum" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapUmumRoutes()
    {
        Route::group([
            'middleware' => ['web', 'umum', 'auth:umum'],
            'prefix' => 'umum',
            'as' => 'umum.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/umum.php');
        });
    }

    /**
     * Define the "kepaladaerah" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapKepaladaerahRoutes()
    {
        Route::group([
            'middleware' => ['web', 'kepaladaerah', 'auth:kepaladaerah'],
            'prefix' => 'kepaladaerah',
            'as' => 'kepaladaerah.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/kepaladaerah.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
