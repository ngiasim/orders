<?php

namespace Ngiasim\Orders;

use Illuminate\Support\ServiceProvider;

/*
Don’t forget to change the namespace of the Provider class – it should be the same as we specified in main composer.json file autoload– in our case, Laraveldaily\Timezones:
*/


class OrderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'orders');
        // $this->publishes([
        // __DIR__.'/views' => base_path('resources/views/orders'),
        // ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         include __DIR__.'/routes.php';
         $this->app->make('Ngiasim\Orders\OrderController');
    }
}
