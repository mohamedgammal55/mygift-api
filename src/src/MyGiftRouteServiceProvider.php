<?php

namespace Gemy\MygiftApi;

use Closure;
use Gemy\MygiftApi\Commands\OrderTableCommand;
use Illuminate\Support\ServiceProvider;

class MyGiftRouteServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {

    }

    protected function registerCommands()
    {
        $this->commands([
            OrderTableCommand::class
        ]);
    }
}
