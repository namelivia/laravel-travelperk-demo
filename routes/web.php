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

Route::get('/', function () { return view('welcome'); });
Route::get('/invoices', 'InvoicesController@all')->name('invoices');
Route::get('/invoices/{serialNumber}', 'InvoicesController@view')->name('invoice');
Route::get('/invoice-profiles', 'InvoicesController@profiles')->name('invoice-profiles');
Route::get('/invoice-lines', 'InvoicesController@lines')->name('invoice-lines');
Route::get('/users', 'UsersController@all')->name('users');
