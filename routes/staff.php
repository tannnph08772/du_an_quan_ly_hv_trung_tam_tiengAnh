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
        'middleware' => 'checkStaff',
    ], function(){
        Route::get('/quan-ly-hoc-vien', 'UserController@dashboardStaff')->name('staffs.dashboardStaff');
        Route::group([
            'prefix' => 'lop-hoc',
            'as' => 'classes.'
        ], function() {
            Route::get('/', 'ClassController@index')->name('index');
            Route::get('/tao-lop-hoc', 'ClassController@create')->name('create');
            Route::post('/store', 'ClassController@store')->name('store');
            Route::get('/chi-tiet-lop-hoc/{id}', 'ClassController@getStudentByClass')->name('getStudentByClass');
        });

        // ca-hoc
        Route::group(['prefix' => 'ca-hoc'],function(){
            Route::get('/', 'ScheduleController@index')->name('schedule.index');
            Route::get('/tao-ca-hoc', 'ScheduleController@add')->name('schedule.add');
            Route::post('/tao-ca-hoc','ScheduleController@create')->name('schedule.create');
            Route::post('/xoa-ca-hoc','ScheduleController@delete')->name('schedule.delete');
            Route::get('/sua-ca-hoc/{id}','ScheduleController@edit')->name('showschedule.edit');
            Route::post('/sua-ca-hoc/{id}','ScheduleController@update')->name('schedule.edit');
        });

        Route::get('/thong-tin/{id}', 'UserController@getInfoHV')->name('users.getInfoHV');
        Route::post('/store/{id}', 'UserController@store')->name('users.store');
        Route::get('/danh-sach-cho', 'AuthController@danhSachCho')->name('auth.danhSachCho');
        Route::get('/danh-sach-hoc-vien', 'UserController@dsHocVien')->name('users.dsHocVien');
        Route::post('remove/{id}', 'AuthController@remove')->name('auth.remove');
        Route::post('/add-hoc-vien', 'AuthController@addHocVien')->name('auth.addhocvien');
        Route::post('/status/{id}', 'UserController@statusHV')->name('student.status');

        Route::get('danh-sach-chuyen-lop','ClassController@classTransferList')->name('staff.classTransferList');
        Route::get('danh-sach-chuyen-lop/{id}','ClassController@classTransferById')->name('staff.classTransferById');
        Route::post('danh-sach-chuyen-lop/store/{id}','ClassController@storeTransfer')->name('staff.storeTransfer');

        Route::get('danh-sach-bao-luu','ReserveController@reserveList')->name('staff.reserveList');
        Route::get('danh-sach-bao-luu/{id}','ReserveController@reserveById')->name('staff.reserveById');
        Route::post('danh-sach-bao-luu/store/{id}','ReserveController@updateReserve')->name('staff.updateReserve');

        Route::get('danh-sach-hoc-vien/{id}','UserController@editStudent')->name('staff.editStudent');
        Route::post('cap-nhat-hoc-vien/{id}','UserController@updateStudent')->name('staff.updateStudent');

        Route::get('danh-sach-hoc-vien-dang-ky/export/', 'AuthController@exportDsHocVienDk')->name('exportDsHocVienDk');
        Route::post('/danh-sach-hoc-vien-dang-ky/import', 'AuthController@storeImport')->name('storeImport');

        Route::get('/danh-sach-nhan-dang-ki','ContactController@index')->name('contact.index');
        Route::post('/xoa-dang-ki','ContactController@delete')->name('contact.delete'); 

        Route::get('/change-pass','UserController@reset')->name('user.reset');
        Route::post('save-pass','UserController@Rspass')->name('user-save');
        Route::get('/hoc-phi/{id}', 'TuitionController@showFormHocPhi')->name('tuition.showFormHocPhi');
        Route::post('/nop-hoc-phi/{id}', 'TuitionController@nopHocPhi')->name('tuition.nopHocPhi');
        Route::get('/danh-sach-hoa-don', 'TuitionController@hoaDon')->name('tuition.hoaDon');
        Route::get('danh-sach-thu-hoc-phi/export/', 'TuitionController@exportHoaDon')->name('exportHoaDon');
        Route::get('export-hoc-vien/', 'UserController@exportDSHV')->name('exportDSHV');

        Route::get('/lop-hoc/{id}/lich', 'ClassController@getCalendarByClass')->name('classes.getCalendarByClass');
        Route::get('/lop-hoc/{id}/sua-lich', 'ClassController@editCalendar')->name('classes.editCalendar');
        Route::post('/lop-hoc/{id}/store', 'ClassController@updateCalendar')->name('classes.updateCalendar');

        Route::get('/xep-lop-hoc-lai/{id}', 'ReserveController@getInfoLearnAgain')->name('reserve.getInfoLearnAgain');
        Route::post('/xep-lop-hoc-lai/{id}', 'ReserveController@updateLearnAgain')->name('reserve.updateLearnAgain');
    });
});