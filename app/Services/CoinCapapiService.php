<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CoinCapapiService
{
    public function getCoins()
    {
        return Http::get('https://api.coincap.io/v2/assets')->throw()->json();
    }

    public function showCoin($crypto)
    {
        return Http::get('https://api.coincap.io/v2/assets/' . $crypto)->throw()->json();
    }

    public function showHistory($crypto)
    {
        return Http::get("https://api.coincap.io/v2/assets/" . $crypto . "/history?interval=d1")->throw()->json();
    }
}
