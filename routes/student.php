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
        'middleware' => 'checkAdmin',
    ], function(){
    });
});

Route::get('/student', function () {
    return view('student');
})->name('student');

Route::get('/bt', function () {
    return view('students.bai_tap_cho_hv');
})->name('student.bt');