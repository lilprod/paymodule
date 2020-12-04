<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
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

//Frontend routes

Route::get('/', 'PageController@index')->name('home');

Route::post('/post/mode', 'PageController@postMode')->name('post_mode');

//Flooz routes

Route::get('get/flooz', 'PageController@getFlooz')->name('get_flooz');

Route::post('/flooz/pay', 'FloozController@pay')->name('flooz_pay');

//Authentification routes

Auth::routes();

//Stripe routes

Route::get('stripe/pay', 'StripeController@stripe')->name('stripe');

Route::post('stripe', 'StripeController@stripePost')->name('stripe.post');

//PayPal route

Route::get('payment', 'PayPalController@payment')->name('payment');

Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');

Route::get('payment/success', 'PayPalController@success')->name('payment.success');