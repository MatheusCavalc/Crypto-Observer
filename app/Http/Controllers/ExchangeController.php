<?php

namespace App\Http\Controllers;

use App\Services\CoinCapapiService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExchangeController extends Controller
{
    public function index(CoinCapapiService $service)
    {
        $exchanges = $service->getExchanges();

        return Inertia::render('Exchanges', compact('exchanges'));
    }
}
