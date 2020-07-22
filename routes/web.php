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

Route::get('customers', 'CustomerController@index')->name('customers.index');
Route::get('customers/export', 'CustomerController@export')->name('customers.export');
Route::get('customers/export_view', 'CustomerController@export_view')->name('customers.export_view');
Route::get('customers/export_store', 'CustomerController@export_store')->name('customers.export_store');

Route::get('customers/export_format/{format}', 'CustomerController@export_format')->name('customers.export_format');
Route::get('customers/export_sheets', 'CustomerController@export_sheets')->name('customers.export_sheets');
Route::get('customers/export_heading', 'CustomerController@export_heading')->name('customers.export_heading');
Route::get('customers/export_mapping', 'CustomerController@export_mapping')->name('customers.export_mapping');
Route::get('customers/export_styling', 'CustomerController@export_styling')->name('customers.export_styling');
Route::get('customers/export_autosize', 'CustomerController@export_autosize')->name('customers.export_autosize');
Route::get('customers/export_dateformat', 'CustomerController@export_dateformat')->name('customers.export_dateformat');
Route::get('customers/export_mergecells', 'CustomerController@export_mergecells')->name('customers.export_mergecells');
Route::get('customers/export_formulas', 'CustomerController@export_mergecells')->name('customers.export_formulas');

Route::post('customers/import', 'CustomerController@import')->name('customers.import');
Route::post('customers/import_large', 'CustomerController@import_large')->name('customers.import_large');
Route::post('customers/import_relationships', 'CustomerController@import_relationships')->name('customers.import_relationships');
Route::post('customers/import_dateformat', 'CustomerController@import_dateformat')->name('customers.import_dateformat');
Route::post('customers/import_errors', 'CustomerController@import_errors')->name('customers.import_errors');

Route::get('export', 'ExportController@excel');
