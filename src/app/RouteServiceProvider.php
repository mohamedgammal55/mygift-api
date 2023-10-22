<?php

namespace Gemy\MygiftApi;

use App\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    private function this_path(){
        return __DIR__;
    }
    public function boot(): void
    {

        $this->routes(function () {
            Route::middleware(['api', 'lang'])
                ->prefix('api')
                ->group(base_path('routes/api.php'));

        });
    }
}
