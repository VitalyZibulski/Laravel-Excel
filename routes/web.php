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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('customers', 'CustomerController@index');
Route::get('customers/export', 'CustomerController@export')->name('customers.export');
Route::get('customers/export_view', 'CustomerController@export_view')->name('customers.export_view');
Route::get('customers/export_store', 'CustomerController@export_store')->name('customers.export_store');

Route::get('customers/export_format/{format}', 'CustomerController@export_format')->name('customers.export_format');
