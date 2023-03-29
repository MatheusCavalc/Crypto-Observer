<?php

namespace App\Http\Controllers;

use App\Services\CoinCapapiService;
use Inertia\Inertia;

class CryptoController extends Controller
{
    public function index(CoinCapapiService $service)
    {
        $cryptos = $service->getCoins();

        return Inertia::render('Index', [
            'cryptos' => $cryptos['data']
        ]);
    }

    public function refresh(CoinCapapiService $service)
    {
        $cryptos = $service->getCoins();

        return $cryptos['data'];
    }

    public function search(CoinCapapiService $service, $search)
    {
        $cryptos = $service->getCoins();

        $arr = [];

        foreach ($cryptos['data'] as $crypto) {
            if (str_contains($crypto['id'], $search)) {
                array_push($arr, [
                    'id' => $crypto['id'],
                    'symbol' => $crypto['symbol']]);
            }
        }

        return $arr;
    }

    public function show(CoinCapapiService $service, $id)
    {
        $crypto = $service->showCoin($id);

        $history = $service->showHistory($id);

        //$labels = (array_map(fn ($index) => date("M 'j", strtotime($index['date'])), $history['data']));
        //$data = (array_map(fn ($index) => explode('.', $index['priceUsd'])[0], $history['data']));

        return Inertia::render('Crypto', compact('crypto'));
    }
}
