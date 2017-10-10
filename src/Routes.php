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
		     //Route::resource('products','ngiasim\products\ProductController');
        });
	});
		});
