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

Auth::routes();
//front
Route::get('/','FrontController@image_home');
Route::get('/home','FrontController@home');
Route::get('/intro','FrontController@intro');
Route::get('/flower','FrontController@flower');
Route::get('/activity','FrontController@activity');
Route::get('/booking','FrontController@booking');
Route::get('/traffic','FrontController@traffic');
Route::get('/firefly_season','FrontController@firefly_season');



Route::group(['middleware' => ['auth','RoleCheck'], 'prefix' =>'/admin'], function (){
    Route::get('/', 'AdminController@index')->name('home');


    // imagehome
    Route::get('/image_home','ImageHomeController@index');
    Route::post('/image_home/sort_up','ImageHomeController@sort_up');
    Route::post('/image_home/sort_down','ImageHomeController@sort_down');
    Route::post('/image_home','ImageHomeController@store');
    Route::post('/image_home/{id}','ImageHomeController@update');


});



