<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       $comp_name="Tech Geometry";
       $comp_full_name="Tech Geometry Pvt. Ltd.";
       $comp_address="Teach Geometry Pvt. Ltd. Satnam Chowk, Begu Road, Sirsa, Haryana.";
       $comp_phone="+91 - 8168531972";
       $comp_email="sonipreetam9@gmail.com";
       $comp_gst="TECH123456XI";
       view()->share('comp_name',$comp_name);
       view()->share('comp_full_name',$comp_full_name);
       view()->share('comp_address',$comp_address);
       view()->share('comp_phone',$comp_phone);
       view()->share('comp_email',$comp_email);
       view()->share('comp_gst',$comp_gst);
    }
}
