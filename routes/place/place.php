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
Route::group(['prefix' => 'co-so-hoc'],function(){
    Route::get('/', 'PlaceController@index')->name('place.index');
    // tao-co-so-hoc
    Route::get('/tao-co-so-hoc', 'PlaceController@add')->name('place.add');
    Route::post('/tao-co-so-hoc','PlaceController@create')->name('place.create');
    //xoa-co-so-hoc
    Route::post('/xoa-co-so-hoc/{id}','PlaceController@delete')->name('place.delete');
    // //sua-co-so-hoc
    Route::get('/sua-co-so-hoc/{id}','PlaceController@edit')->name('showplace.edit');
    Route::post('/sua-co-so-hoc/{id}','PlaceController@update')->name('place.edit');

}
);
	