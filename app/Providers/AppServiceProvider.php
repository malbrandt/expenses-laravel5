<?php

namespace App\Providers;

use App\Helpers\ItemCards;
use App\Http\Controllers\AdminController;
use App\User;
use Illuminate\Support\Facades\Auth;
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

        view()->composer('layouts.partials.icon-cards', function($view) {
            $view->with('cards', ItemCards::forUser(Auth::user()));
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
