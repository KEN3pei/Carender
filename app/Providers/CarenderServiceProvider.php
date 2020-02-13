<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CarenderService;//追記

class CarenderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CarenderService::class, CarenderService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
