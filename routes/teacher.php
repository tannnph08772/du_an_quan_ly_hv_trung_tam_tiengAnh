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
        'middleware' => 'checkTeacher',
    ], function(){
        Route::get('giang-vien/dashboard', 'UserController@dashboardTeacher')->name('teachers.dashboardTeacher');
        Route::get('lop-hoc/{id}', 'AttendanceController@index')->name('attendance.index');
        Route::get('diem-danh/{id}', 'AttendanceController@create')->name('attendance.create');
        Route::get('danh-sach-lop', 'ClassController@getClassByTeacher')->name('classes.getClassByTeacher');
        Route::get('lich-su-day', 'ClassController@getClassHistoryByTeacher')->name('classes.getClassHistoryByTeacher');
        Route::post('diem-danh/store', 'AttendanceController@store')->name('attendance.store'); 
        Route::get('danh-sach-bai-tap', 'HomeWorkController@index')->name('homework.index');
        Route::get('tao-bai-tap', 'HomeWorkController@showFormHomework')->name('homework.showFormHomework');
        Route::post('tao-bai-tap', 'HomeWorkController@storeBT')->name('homeworks.storeBT');
        Route::get('danh-sach-nop-bai/{id}', 'HomeWorkController@dsNopBai')->name('homework.dsNopBai');
        Route::get('lich-day','AttendanceController@showCalendarTea')->name('teachers.showCalendarTea');
        Route::get('/change-password','UserController@resetpass')->name('user.resetpass');
        Route::post('save-password','UserController@Resetspass')->name('user-savepass');
    });
});
