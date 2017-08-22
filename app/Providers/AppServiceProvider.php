<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *9
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.navbars', function ($view) {
            $view->with('links', config('navbar'));
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
