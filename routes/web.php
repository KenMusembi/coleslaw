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

Auth::routes();

Route::get('/home', 'QuestionController@index')->name('home');
Route::get('/create', 'QuestionController@create')->name('create');
Route::post('/qaction','QuestionController@storeQuestion');
Route::post('/action','QuestionController@storeAnswer');
