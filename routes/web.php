<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/type/{id}', 'HomeController@show')->name('home.show');

Route::get('/product/create','ProductController@create')->name('product.create');
Route::post('/product','ProductController@store')->name('product.store');
Route::get('/product/{id}','ProductController@show')->name('product.show');
Route::get('/product/{id}/edit','ProductController@edit')->name('product.edit');
Route::patch('/product/{id}','ProductController@update')->name('product.update');
Route::delete('/product/{id}', 'ProductController@destroy')->name('product.destroy');

Route::get('/type', 'StationaryTypeController@index')->name('type.index');
Route::get('/type/create', 'StationaryTypeController@create')->name('type.create');
Route::post('/type','StationaryTypeController@store')->name('type.store');
Route::patch('/type/{id}','StationaryTypeController@update')->name('type.update');
Route::delete('/type/{id}', 'StationaryTypeController@destroy')->name('type.destroy');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/{id}/edit', 'CartController@edit')->name('cart.edit');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');

Route::get('/transaction', 'TransactionController@checkout')->name('transaction.checkout');
Route::get('/transaction-history', 'TransactionController@index')->name('transaction.index');
