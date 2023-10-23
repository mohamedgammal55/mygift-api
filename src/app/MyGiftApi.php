<?php

namespace Gemy\MygiftApi\App;

use Illuminate\Support\Facades\Http;

trait MyGiftApi
{
    private $url = "http://127.0.0.1:8000/code-api/";

    public function checkIfCodeExists($code, $slug)
    {
        $response = Http::post("{$this->url}checkCode", ['code' => $code, 'slug' => $slug]);
        return $response;
    }


    public function useCoupon($code, $slug, $order_id, $coupn_discount)
    {
        $response = Http::post("{$this->url}checkCode", ['code' => $code, 'slug' => $slug]);
        if ($response['status'] != 200) {
            return $response;
        }
    }
}
