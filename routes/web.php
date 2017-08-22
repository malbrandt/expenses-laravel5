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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//
//Route::get('/', function () {
//    if (Auth::user() == false) {
//        return view('auth.login');
//    } else {
//        return view('home');
//    }
//});

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

});

Route::get('/', 'HomeController@index')->name('home');
