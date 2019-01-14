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
    return view('welcome');
});
Route::post('/details_save', 'studentdetailcontoller@create');
Route::get('/university_details','studentdetailcontoller@index');
Route::get('/delete_details/{id}','studentdetailcontoller@destroy');
Route::get('/edit_details/{id}','studentdetailcontoller@edit');
Route::post('/update_details/{id}','studentdetailcontoller@update');

