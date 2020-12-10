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

Route::get('/product/create','ProductController@create')->name('product.create')->middleware('admin');
Route::post('/product','ProductController@store')->name('product.store')->middleware('admin');
Route::get('/product/{id}','ProductController@show')->name('product.show')->middleware('auth');
Route::get('/product/{id}/edit','ProductController@edit')->name('product.edit')->middleware('admin');
Route::patch('/product/{id}','ProductController@update')->name('product.update')->middleware('admin');
Route::delete('/product/{id}', 'ProductController@destroy')->name('product.destroy')->middleware('admin');

Route::get('/type', 'StationaryTypeController@index')->name('type.index')->middleware('admin');
Route::get('/type/create', 'StationaryTypeController@create')->name('type.create')->middleware('admin');
Route::post('/type','StationaryTypeController@store')->name('type.store')->middleware('admin');
Route::patch('/type/{id}','StationaryTypeController@update')->name('type.update')->middleware('admin');
Route::delete('/type/{id}', 'StationaryTypeController@destroy')->name('type.destroy')->middleware('admin');

Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth','member');
Route::get('/cart/{id}/edit', 'CartController@edit')->name('cart.edit')->middleware('auth','member');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store')->middleware('auth','member');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy')->middleware('auth','member');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update')->middleware('auth','member');

Route::get('/transaction', 'TransactionController@checkout')->name('transaction.checkout')->middleware('auth','member');
Route::get('/transaction-history', 'TransactionController@index')->name('transaction.index')->middleware('auth','member');
