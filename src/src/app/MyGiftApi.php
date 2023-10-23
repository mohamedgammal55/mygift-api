<?php

namespace Gemy\MygiftApi\App;

use Illuminate\Support\Facades\Http;

trait MyGiftApi
{
    protected $url;

    public function __construct()
    {
        $this->url = "http://127.0.0.1:8000/code-api/";
    }

    public function checkCode($code, $app)
    {
        $response = Http::post("{$this->url}checkCode",['code'=>$code,'app'=>$app]);
        return $response;
    }
}
