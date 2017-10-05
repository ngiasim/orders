<?php
Route::group([
    'domain' => Config::get('app.domains.store')
], function () {
Route::get('order', 
  'ngiasim\orders\OrderController@index');
});
