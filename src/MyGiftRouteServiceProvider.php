<?php

namespace Gemy\MygiftApi;

use Closure;
use Gemy\MygiftApi\Commands\OrderTableCommand;
use Illuminate\Support\ServiceProvider;

class MyGiftRouteServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->commands([
            OrderTableCommand::class
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/../config/mygift-api.php',
            'mygift-api'
        );

    }


    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/mygift-api.php' => config_path('mygift-api.php'),
            ], 'config');
        }
    }

}
