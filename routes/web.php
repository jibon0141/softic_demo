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

// Route::get('/', function () {
//     return view('/');
// });



Route::get('/payment','SslCommerzPaymentController@exampleEasyCheckout');

Route::post('/pay','SslCommerzPaymentController@index')->name('pay');

Route::post('/success','SslCommerzPaymentController@success');
Route::post('/fail','SslCommerzPaymentController@fail');
Route::post('/cancel','SslCommerzPaymentController@cancel');

Route::post('/ipn','SslCommerzPaymentController@ipn');


