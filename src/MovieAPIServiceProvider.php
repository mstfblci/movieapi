<?php

namespace Mediapiar\MovieAPI;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MovieAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->publishes([
            __DIR__.'/../config/movieapi.php' => config_path('movieapi.php')
        ], 'config');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::middleware('api')->prefix('api')->group(function () {
            $this->loadRoutesFrom(__DIR__ . '/routes.php');
        });
    }
}