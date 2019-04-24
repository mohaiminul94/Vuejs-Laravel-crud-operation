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


Route::get('/', 'studentController@index');

Route::post('/save_data', 'studentController@store');

Route::get('/view_allStudents', 'studentController@view');

Route::get('/delete/{id}', 'studentController@delete');

Route::post('/update_data/{id}', 'studentController@update');