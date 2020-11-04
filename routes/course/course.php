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
	