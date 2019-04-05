<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $name = ['\User', '\Role', '\Category', '\Coupon', '\FastFood', '\Film', '\Order', '\Seat', '\Store', '\TimeShow', '\Room', '\Comment'];
        foreach ($name as $value) {
            $this->app->singleton(
                'App\Repositories\Contracts'.$value.'Interface',
                'App\Repositories'.$value.'Repository'
            );
        }
    }
}
