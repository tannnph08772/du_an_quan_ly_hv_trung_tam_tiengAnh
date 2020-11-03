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
Route::get('/khoa-hoc', 'AuthController@danhSachKhoaHoc')->name('auth.danhSachKhoaHoc');
Route::get('/khoa-hoc/{id}', 'AuthController@chiTietKhoaHoc')->name('auth.chiTietKhoaHoc');
Route::post('/store', 'AuthController@store')->name('auth.store');
Route::get('/danh-sach-cho', 'AuthController@danhSachCho')->name('auth.danhSachCho');
Route::post('/export-csv','AuthController@export_csv');
Route::post('/import-csv','AuthController@import_csv');

