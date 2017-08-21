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

Route::get('/', function () {
	if (Auth::user() == false) {
	    return view('auth.login');
	} else {
		return view('home');
	}
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/expenses', 'ExpensesController');
Route::resource('/payments', 'PaymentsController');