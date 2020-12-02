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

Route::group([
    'middleware' => 'checkAuth',
], function(){
    Route::group([
        'middleware' => 'checkStudent',
    ], function(){
        Route::get('/bai-tap', 'HomeWorkController@show')->name('homework.show'); 
        Route::get('/chi-tiet-bai-tap/{id}', 'HomeWorkController@chiTietBT')->name('chiTietBT');
        Route::post('/nop-bai/{id}', 'HomeWorkController@nopBai')->name('nopBai');
    });
});
Route::get('/download/{file}', 'HomeWorkController@download')->name('download');
Route::post('/store', 'AuthController@store')->name('auth.store');