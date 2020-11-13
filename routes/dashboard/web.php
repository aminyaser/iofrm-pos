<?php
Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'HomeController@index')->name('index');


            // categories route
            Route::resource('categories', 'CategoryController')->except(['show']);

            //products
            Route::resource('products', 'ProductController')->except(['show']);

            // clients routes
            Route::resource('clients', 'ClientController')->except(['show']);

            // users routes
            Route::resource('users', 'UserController')->except(['show']);

            // client routes
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

            // order routes
            Route::resource('orders', 'OrderController')->except(['show']);

            Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');
            Route::get('/update_status/{id}', 'OrderController@update_status')->name('orders.update_status');



            // Auth::routes(['register' => false]);
        });
    }
);
