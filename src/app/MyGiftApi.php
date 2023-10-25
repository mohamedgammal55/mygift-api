<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

trait MyGiftApi
{
    private $url = "https://my-gift.ascit.sa/code-api/";

    public function checkIfCodeExists($code, $slug)
    {
        $response = Http::post("{$this->url}checkCode", ['code' => $code, 'slug' => $slug]);
        return json_decode($response, true);
    }


    public function useCoupon($code, $slug, $order_id, $coupn_discount)
    {
        $response = Http::post("{$this->url}checkCode", ['code' => $code, 'slug' => $slug]);
        $response = json_decode($response, true);
        if ($response['status'] != 200) {
            return $response;
        }

        $responseUse = Http::post("{$this->url}useCode", ['code' => $code, 'slug' => $slug]);

        $responseUse = json_decode($responseUse, true);
        if ($responseUse['status'] != 200) {
            return $responseUse;
        }

        $total = (array)DB::table(config('mygift-api.table'))->find($order_id);

        $total = $total[config('mygift-api.total_column')];
        $latestTotal = (doubleval($total) - doubleval($coupn_discount));

        $updateData['mygiftid'] = $responseUse['data']['id'];
        $updateData['mygiftcode'] = $code;
        $updateData['mygiftdiscount'] = $coupn_discount;
        $updateData[config('mygift-api.total_column')] = $latestTotal;
        DB::table(config('mygift-api.table'))->where('id', $order_id)->update($updateData);

        return $responseUse;

    }
}
