<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PlaceController;

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
Route::group(['prefix' => 'ca-hoc'],function(){
    Route::get('/', 'ScheduleController@index')->name('schedule.index');
    //tao-ca-hoc
    Route::get('/tao-ca-hoc', 'ScheduleController@add')->name('schedule.add');
    Route::post('/tao-ca-hoc','ScheduleController@create')->name('schedule.create');
    //xoa-ca-hoc
    Route::post('/xoa-ca-hoc/{id}','ScheduleController@delete')->name('schedule.delete');
    //sua-ca-hoc
    Route::get('/sua-ca-hoc/{id}','ScheduleController@edit')->name('showschedule.edit');
    Route::post('/sua-ca-hoc/{id}','ScheduleController@update')->name('schedule.edit');

}
);
		