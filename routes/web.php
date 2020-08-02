<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoices', function () {
    return view('invoices', ['data' => TravelPerk::expenses()->invoices()->all()]);
})->name('invoices');

Route::get('/invoice-profiles', function () {
    return view('invoice-profiles', ['data' => TravelPerk::expenses()->invoiceProfiles()->all()]);
})->name('invoice-profiles');

Route::get('/invoice-lines', function () {
    return view('invoice-lines', ['data' => TravelPerk::expenses()->invoices()->lines()]);
})->name('invoice-lines');
