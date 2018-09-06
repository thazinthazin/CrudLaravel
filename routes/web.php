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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/customer','CustomerController@index')->name('customer');
	Route::get('/customer/create', 'CustomerController@create')->name('customer_create');
	Route::post('/customer/create', 'CustomerController@store');
	Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer_edit');
	Route::post('/customer/edit/{id}', 'CustomerController@update');
	Route::delete('/customer/delete/{id}','CustomerController@destroy');
});