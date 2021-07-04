<?php

namespace App\Providers;

use App\Helpers\CustomFunctions;
use Illuminate\Support\ServiceProvider;

class CustomFunctionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('CustomFunctions',function(){

            return new CustomFunctions();

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
