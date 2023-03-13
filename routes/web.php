<?php

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\ExchangeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[CryptoController::class, 'index'])->name('index.crypto');
Route::get('/currencies/{id}', [CryptoController::class, 'show'])->name('show.crypto');
Route::get('/ranking/exchanges', [ExchangeController::class, 'index'])->name('index.exchange');
Route::get('/refresh-data', [CryptoController::class, 'refresh'])->name('refresh.crypto');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
