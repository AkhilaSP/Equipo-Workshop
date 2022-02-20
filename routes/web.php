<?php

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
    return view('index');
});
Route::get('/index', 'IndexController@index')->name('index');
Route::post('/index', 'IndexController@store')->name('index');
Route::get('/pdf_file/{consultationID}','IndexController@pdf_file');
Route::get('/viewPrevious','IndexController@viewPrevious')->name('viewPrevious');
Route::get('/exportCsv', 'IndexController@exportCsv');
