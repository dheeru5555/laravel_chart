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
    return view('welcome');
});


// Route::get('/chart',[ChartController::class,'viewChart']);

Route::get('/chart', 'ChartController@viewChart');
Route::get('/chartView/create', 'ChartController@createStudentData')->name('chart-view');
Route::post('/chartInsert', 'ChartController@storeStudentData')->name('chart-insert');

Route::get('/studentDelete', 'ChartController@deleteStudentData')->name('student-delete');

Route::get('/statics','ChartController@showStatics');

// Route::delete('/delete/{id}','ChartController@deleteStudentData');


