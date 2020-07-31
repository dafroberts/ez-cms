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

Route::get('/admin/collections', 'Ez\Editor\CollectionController@index')->name('ez.collection.index');
Route::get('/admin/collections/{collection}', 'Ez\Editor\CollectionController@show')->name('ez.collection.show');
Route::get('/admin/collections/{collection}/edit/{id}', 'Ez\Editor\CollectionController@editRow')->name('ez.collection.row.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
