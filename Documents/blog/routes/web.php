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
Route::get('/main', 'MainController@main');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('products','ProductsController');
Route::resource('categories','CategoriesController');
Route::resource('shopping_carts','ShoppingCartsController',['only'=>['store','destroy']]);
Route::resource('orders','OrdersController');
Route::resource('orderProducts','OrderProductsController');
Route::resource('addresses','AddressesController');
