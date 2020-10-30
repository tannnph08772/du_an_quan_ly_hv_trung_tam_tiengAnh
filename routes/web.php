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
    return view('client');
});
Route::get('/dang-ki', 'AuthController@register')->name('register.register');
Route::post('/store', 'AuthController@store')->name('register.store');
Route::get('/danh-sach-cho', 'AuthController@danh_sach_cho')->name('register.danh_sach_cho');
