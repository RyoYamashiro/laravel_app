<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Say;

class SayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('say', function(){
            return new Say();
        });
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
