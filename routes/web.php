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
Route::get('/users_no_scim', 'UsersNoSCIMController@all')->name('users_no_scim');
Route::get('/discovery', 'DiscoveryController@discovery')->name('discovery');
Route::get('/webhooks', 'WebhooksController@all')->name('webhooks');
Route::get('/webhooks/create', 'WebhooksController@create')->name('create-webhook');
Route::get('/webhooks/{id}', 'WebhooksController@view')->name('webhook');
Route::post('/webhooks/create', 'WebhooksController@save');
Route::get('/webhooks/{id}/modify', 'WebhooksController@modify')->name('modify-webhook');
Route::post('/webhooks/{id}/modify', 'WebhooksController@update');
Route::delete('/webhooks/{id}', 'WebhooksController@delete')->name('delete-webhook');
Route::post('/webhooks/{id}/test', 'WebhooksController@test')->name('test-webhook');
Route::get('/users/create', 'UsersController@create')->name('create-user');
Route::get('/users/{id}', 'UsersController@view')->name('user');
Route::post('/users/create', 'UsersController@save');
Route::get('/users/{id}/modify', 'UsersController@modify')->name('modify-user');
Route::post('/users/{id}/modify', 'UsersController@update');
Route::delete('/users/{id}', 'UsersController@delete')->name('delete-user');
Route::get('/travelsafe', 'TravelSafeController@index')->name('travelsafe');
Route::post('/travelsafe/restrictions', 'TravelSafeController@restrictions')->name('get-restrictions');
Route::post('/travelsafe/summary', 'TravelSafeController@summary')->name('get-summary');
Route::post('/travelsafe/airline', 'TravelSafeController@airline')->name('get-airline');
