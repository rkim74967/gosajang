<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/order', 'OrderController');
    Route::get('/order/delete/{id}', 'OrderController@destroy')->name('order.destroy');
    Route::resource('/product', 'ProductController');
    Route::resource('/sales', 'SaleController');
    Route::post('/sales/searchDate', 'SaleController@searchDate');
    Route::post('/sales/searchBtn/{button}', 'SaleController@searchBtn');


});

