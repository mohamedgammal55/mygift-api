<?php

namespace Gemy\MygiftApi;

use Illuminate\Support\Facades\Facade;

class MyGiftApi extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "mygift-api";
    }

}
