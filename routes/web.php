<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::resource('expenses', 'ExpensesController');

    /**
     * Payments related (CRUD, moderating)
     */
    Route::post('payments/{payment}/moderate', 'PaymentsController@moderate')->name('moderate-payment');
    Route::resource('payments', 'PaymentsController');
    Route::get('expenses/{expense}/add-payment', 'PaymentsController@create')->name('add-payment');
    Route::post('expenses/{expense}/add-payment', 'PaymentsController@store')->name('store-payment');
    // scoping - payments {pending|rejected|approved}
    Route::get('payments/status/{status}', 'PaymentsController@status')->name('payments.status');


    /**
     * Admin related
     */
    Route::group(['middleware' => 'role:admin'], function () {

        // scoping - user's expenses and payments
        foreach (['expenses', 'payments'] as $var) {
            Route::get("$var/user/{user}", function (User $user) use ($var) {
                $$var = $user->{$var}()->orderBy('created_at', 'desc')->get();
                return view("$var.index", compact("$var"));
            });
        }

        Route::get('payments/user/{user}/{status}', 'PaymentsController@status')->name('payments.user.status');
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
    });
});

Route::get('/', 'HomeController@index')->name('home');
