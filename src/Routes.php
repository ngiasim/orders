<?php
Route::group([
    'domain' => Config::get('app.domains.cockpit')
], function () {

    Route::group(['middleware' => ['web']], function () {
		Route::group([
		'middleware' => ['auth']
	], function () {
        Route::get('phoneorder','ngiasim\orders\OrderController@phoneOrder');
		    Route::get('getProduct/{id?}', 'ngiasim\orders\OrderController@getProductsByProductId');
        Route::get('getCustomers/{id?}', 'ngiasim\orders\OrderController@getCustomersByCustomerId');
        Route::post('placeOrder','ngiasim\orders\OrderController@checkout');

        Route::get('/order','ngiasim\orders\OrderController@index');
        Route::get('/order/{id}','ngiasim\orders\OrderController@viewOrder');
         //Route::resource('products','ngiasim\products\ProductController');
        });
	});
		});
