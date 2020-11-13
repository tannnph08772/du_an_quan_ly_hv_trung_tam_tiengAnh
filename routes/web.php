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

<<<<<<< HEAD
// Route::get('/', function () {
//     return view('index');
// });

Route::group([
    'prefix' => 'lop-hoc',
    'as' => 'classes.'
], function() {
    Route::get('/', 'ClassController@index')->name('index');
    Route::get('/tao-lop-hoc', 'ClassController@create')->name('create');
    Route::post('/store', 'ClassController@store')->name('store');
});

Route::get('/', function() {
    return view('client');
});
Route::get('/','CourseController@showcourse')->name('client.home');
Route::get('chi-tiet-khoa-hoc/{id}','CourseController@single')->name('english.single');

// khoa-hoc
Route::group(['prefix' => 'khoa-hoc'],function(){
    Route::get('/', 'CourseController@index')->name('course.index');
    //tao-khoa-hoc
    Route::get('/tao-khoa-hoc', 'CourseController@add')->name('course.add');
    Route::post('/tao-khoa-hoc','CourseController@create')->name('course.create');
    // //xoa-co-so-hoc
    Route::post('/xoa-khoa-hoc','CourseController@delete')->name('course.delete');
    // // //sua-co-so-hoc
    Route::get('/sua-khoa-hoc/{id}','CourseController@edit')->name('showcourse.edit');
    Route::post('/sua-khoa-hoc/{id}','CourseController@update')->name('course.edit');
}
);

// co-so-hoc
Route::group(['prefix' => 'co-so-hoc'],function(){
    Route::get('/', 'PlaceController@index')->name('place.index');
    // tao-co-so-hoc
    Route::get('/tao-co-so-hoc', 'PlaceController@add')->name('place.add');
    Route::post('/tao-co-so-hoc','PlaceController@create')->name('place.create');
    //xoa-co-so-hoc
    Route::post('/xoa-co-so-hoc','PlaceController@delete')->name('place.delete');
    // //sua-co-so-hoc
    Route::get('/sua-co-so-hoc/{id}','PlaceController@edit')->name('showplace.edit');
    Route::post('/sua-co-so-hoc/{id}','PlaceController@update')->name('place.edit');

}
);

// ca-hoc
Route::group(['prefix' => 'ca-hoc'],function(){
    Route::get('/', 'ScheduleController@index')->name('schedule.index');
    //tao-ca-hoc
    Route::get('/tao-ca-hoc', 'ScheduleController@add')->name('schedule.add');
    Route::post('/tao-ca-hoc','ScheduleController@create')->name('schedule.create');
    //xoa-ca-hoc
    Route::post('/xoa-ca-hoc','ScheduleController@delete')->name('schedule.delete');
    //sua-ca-hoc
    Route::get('/sua-ca-hoc/{id}','ScheduleController@edit')->name('showschedule.edit');
    Route::post('/sua-ca-hoc/{id}','ScheduleController@update')->name('schedule.edit');

}
);
=======
Route::get('/thong-tin/{id}', 'UserController@getInfoHV')->name('users.getInfoHV');
Route::post('/store/{id}', 'UserController@store')->name('users.store');
>>>>>>> ec2f049... tannn_them_hoc_vien_vao_lop
