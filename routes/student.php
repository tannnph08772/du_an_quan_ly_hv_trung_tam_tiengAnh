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
        Route::get('hoc-vien/lich-hoc','AttendanceController@showCalendarStu')->name('student.showCalendarStu');
        Route::get('hoc-vien/diem-danh','AttendanceController@showAttendance')->name('student.showAttendance');
        Route::get('hoc-vien/don-chuyen-lop','IndexController@showForm')->name('student.showForm');
        Route::post('hoc-vien/don-chuyen-lop/store','IndexController@storeForm')->name('student.storeForm');
        Route::get('/danh-sach-bai-tap-da-nop', 'HomeWorkController@dsBaiTap')->name('homework.dsBaiTap'); 
        Route::get('sinh-vien/don-bao-luu','IndexController@formReserve')->name('student.formReserve');
        Route::post('sinh-vien/don-bao-luu/store','IndexController@storeReserve')->name('student.storeReserve');
        Route::get('hoc-vien/dang-ky-khoa-hoc-moi', 'UserController@dkKhoaMoi')->name('student.dkKhoaMoi'); 
        Route::post('hoc-vien/dang-ky-khoa-hoc-moi','UserController@storeKhoaHocMoi')->name('student.storeKhoaHocMoi');
    });
});
Route::get('/download/{file}', 'HomeWorkController@download')->name('download');
Route::post('/store', 'AuthController@store')->name('auth.store');