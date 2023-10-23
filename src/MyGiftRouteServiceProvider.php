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

    }


    public function boot()
    {

    }

}
