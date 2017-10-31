<?php
Route::group([
    'domain' => Config::get('app.domains.cockpit')
], function () {

    Route::group(['middleware' => ['web']], function () {
		Route::group([
		'middleware' => ['auth']
	], function () {
		
        Route::get('/cart', 'ngiasim\orders\CartController@index'); //->name('roles.destroy')->middleware(['permission:role-delete']);
    	Route::post('/addcart', 'ngiasim\orders\CartController@addToCart'); //->name('roles.destroy')->middleware(['permission:role-delete']);
    	Route::post('/updatecart', 'ngiasim\orders\CartController@updateCart');
        Route::post('/deletecartitem', 'ngiasim\orders\CartController@deleteCartItem');
        Route::post('/addCartCustomer', 'ngiasim\orders\CartController@addCustomerToCart');

        Route::get('phoneorder','ngiasim\orders\OrderController@phoneOrder');
		Route::get('getProduct/{id?}', 'ngiasim\orders\OrderController@getProductsByProductId');
        Route::get('getCustomers/{id?}', 'ngiasim\orders\OrderController@getCustomersByCustomerId');
        Route::post('placeOrder','ngiasim\orders\OrderController@checkout');

        Route::get('/order','ngiasim\orders\OrderController@index');
        Route::get('/order/getdata', 'ngiasim\orders\OrderController@getOrders')->name('order/getdata');
        Route::get('/order/{id}','ngiasim\orders\OrderController@viewOrder');
     
        Route::post('/saveAddress', 'ngiasim\orders\OrderController@saveAddress');
        
        Route::post('/addComment/{id}', 'ngiasim\orders\OrderController@addComment'); 
        //Route::resource('products','ngiasim\products\ProductController');	
        
        
        
	});
		Route::group([
				'middleware' => ['auth']
		], function () {
			/////****** shipments ********/////
			Route::post('/order/update/{id}','ngiasim\orders\ShipmentController@updateOrder');
			Route::get('/order/deliver/{orderId}/{shipmentId}','ngiasim\orders\ShipmentController@deliver');
			/////****** shipments ********/////
			
		});
		
	});
		});
