<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MidtransServiceProvider extends ServiceProvider
{   
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Set Midtrans Configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$clientKey = config('midtrans.client_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$is3ds = true;
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

}
