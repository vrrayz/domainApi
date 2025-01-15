<?php

use App\Http\Controllers\DomainApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// LIVE SERVER === https://coral-bear-659564.hostingersite.com/

Route::get('/', [DomainApiController::class, 'index']);
Route::get('/response', function () {
    dd('Payment Response Done');
});
Route::get('/create-domain', [DomainApiController::class, 'createDomain']);
Route::get('/get-domain-pricing', [DomainApiController::class, 'getDomainPricing']);
Route::get('/get-ssl-pricing', [DomainApiController::class, 'getSslPricing']);
Route::get('/add-funds', [DomainApiController::class, 'addFunds']);
