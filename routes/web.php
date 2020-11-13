<?php

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

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        // categories route
        Route::get('/', 'site\HomeController@index'); // home

        Route::get('/product/{id}/{name}', 'site\HomeController@product'); // home

        Route::get('/my-orders', 'site\HomeController@MyOredrs'); // home

        Route::get('autocomplete', 'site\HomeController@search');

        Route::get('/cart/', 'site\HomeController@cart')->name('cart'); // user card

        Route::get('/cart_total', 'site\HomeController@cart_step_two'); // user card

        Route::post('/add_detils', 'site\HomeController@add_detiles')->name('add_detiles'); // user card

        Route::get('/get-checkout-id/{price}', 'dashboard\PaymentProviderController@getcheckout');

        Route::get('/payment-checkout/{id}', 'site\HomeController@payment');

        Route::get('/GetStatus/', 'dashboard\PaymentProviderController@GetPaymentStatus');

        Route::get('/update-card/{order}/{client}', 'site\HomeController@update');

        Route::post('/store-order/{user}', 'site\HomeController@store')->name('new-order');


        Auth::routes();
    }
);
