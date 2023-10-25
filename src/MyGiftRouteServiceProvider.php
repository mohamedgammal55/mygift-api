<?php

namespace Gemy\MygiftApi;

use Closure;
use Commands\OrderTableCommand;
use Commands\SlugCommand;
use Illuminate\Support\ServiceProvider;

class MyGiftRouteServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->commands([
            OrderTableCommand::class,
            SlugCommand::class,
        ]);

    }


    public function boot()
    {

    }

}
