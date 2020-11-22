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
	'as' => 'auth.'
], function () {
    Route::get('login', 'AuthController@showLoginForm')->name('showLoginForm');
	Route::post('login', 'AuthController@login')->name('login');
	Route::get('logout', 'AuthController@logOut')->name('logOut');
});
Route::group([
    'middleware' => 'checkAdmin',
], function(){
    Route::get('/dashboard', 'UserController@dashboardAdmin')->name('admin.dashboardAdmin');
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
    });
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

    });
    Route::group([
        'prefix' => 'nhan-vien'
    ],function(){
        Route::get('/', 'UserController@indexStaff')->name('staff.index');
        Route::get('/tao-tai-khoan', 'UserController@createStaff')->name('staff.create');
        Route::post('/store', 'UserController@storeStaff')->name('staff.store');
        Route::post('/status/{id}', 'UserController@statusStaff')->name('staff.status');
        Route::get('/sua-tai-khoan/{id}', 'UserController@editStaff')->name('staff.edit');
        Route::post('/update/{id}', 'UserController@updateStaff')->name('staff.update');
    });
    
    Route::group([
        'prefix' => 'giang-vien'
    ],function(){
        Route::get('/', 'UserController@indexTeacher')->name('teacher.index');
        Route::get('/tao-tai-khoan', 'UserController@createTeacher')->name('teacher.create');
        Route::post('/store', 'UserController@storeTeacher')->name('teacher.store');
        Route::post('/status/{id}', 'UserController@statusTeacher')->name('teacher.status');
        Route::get('/sua-tai-khoan/{id}', 'UserController@editTeacher')->name('teacher.edit');
        Route::post('/update/{id}', 'UserController@updateTeacher')->name('teacher.update');
    });
});

Route::get('/','CourseController@showcourse')->name('client.home');
Route::get('chi-tiet-khoa-hoc/{id}','CourseController@single')->name('english.single');

Route::get('/', function () {
    return view('clients.home');
})->name('home');

Route::get('/lien-he', function () {
    return view('clients.contact');
})->name('contact');

Route::get('/tin-tuc', function () {
    return view('clients.news');
})->name('news');

Route::get('/gioi-thieu', function () {
    return view('clients.intro');
})->name('mission');

Route::get('/cam-nhan-cua-hoc-vien', function () {
    return view('clients.feelOfStudent');
})->name('feelOfStudent');

Route::get('/doi-ngu-dao-tao', function () {
    return view('clients.trainingTeam');
})->name('trainingTeam');

Route::get('/phuong-phap-tpr', function () {
    return view('study-methods.tpr-method');
})->name('tpr-method');

Route::get('/phuong-phap-shadowing', function () {
    return view('study-methods.shadowing-method');
})->name('shadowing-method');

Route::get('/phuong-phap-nlp', function () {
    return view('study-methods.nlp-method');
})->name('nlp-method');

Route::get('/phuong-phap-ale', function () {
    return view('study-methods.ale-method');
})->name('ale-method');
Route::get('/dang-ki', 'AuthController@register')->name('register.register');
Route::post('/store', 'AuthController@store')->name('register.store');

