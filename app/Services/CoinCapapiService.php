<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CoinCapapiService
{
    public function getCoins($offset)
    {
        return Http::get('https://api.coincap.io/v2/assets?limit=20&offset=' . $offset)->throw()->json();
    }

    public function showCoin($crypto)
    {
        return Http::get('https://api.coincap.io/v2/assets/' . $crypto)->throw()->json();
    }

    public function showHistory($crypto)
    {
        return Http::get("https://api.coincap.io/v2/assets/" . $crypto . "/history?interval=d1")->throw()->json();
    }

    public function getExchanges()
    {
        return Http::get('https://api.coincap.io/v2/exchanges')->throw()->json();
    }
}
