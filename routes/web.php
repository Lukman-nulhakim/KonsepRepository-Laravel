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

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::resource('/home', 'HomeController');
    Route::resource('/contact', 'ContactController');
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/{id?}', 'ContactController@indexFormContact'); // {id?} jadi ini untuk menanyakan jika ada di yg dipanggil itu dia mengEdit / jika tidak dia menStore(ini menjalankan pungsi store dan Edit secara bersmaan)
    Route::any('/store/{id?}', 'ContactController@storeFormContact'); // Any adalah mengecek fungsi repo apakah dia update atau simpan
});


