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

Route::get('/test_queue','FrontController@test_queue');
Route::get('/test_mail','FrontController@test_mail');
Route::get('/testpy','FrontController@testpy');



Auth::routes();


//front
Route::get('/','FrontController@image_home');
Route::get('/home','FrontController@home');
Route::get('/intro','FrontController@intro');
Route::get('/flower','FrontController@flower');
Route::get('/activity','FrontController@activity');
Route::get('/booking','FrontController@booking');
Route::get('/booking_record','FrontController@booking_record');
Route::post('/booking_record_search','FrontController@booking_record_search');
Route::get('/traffic','FrontController@traffic');
Route::get('/firefly_season','FrontController@firefly_season');
Route::post('/booking_form_store','FrontController@booking_form_store');


Route::group(['middleware' => ['auth','RoleCheck'], 'prefix' =>'/admin'], function (){
    Route::get('/', 'AdminController@index')->name('home');

    // ig img
    Route::get('/ig_img','IGImgController@index');
    Route::post('/ig_img/sort_up','IGImgController@sort_up');
    Route::post('/ig_img/sort_down','IGImgController@sort_down');
    Route::post('/ig_img','IGImgController@store');
    Route::patch('/ig_img/{id}','IGImgController@update');
    Route::delete('/ig_img/{id}','IGImgController@delete');


    // imagehome
    Route::get('/image_home','ImageHomeController@index');
    Route::post('/image_home/sort_up','ImageHomeController@sort_up');
    Route::post('/image_home/sort_down','ImageHomeController@sort_down');
    Route::post('/image_home','ImageHomeController@store');
    Route::patch('/image_home/{id}','ImageHomeController@update');
    Route::delete('/image_home/{id}','ImageHomeController@delete');

    // flower
    Route::get('/flower','FlowerController@index');
    // Route::post('/flower/sort_up','FlowerController@sort_up');
    // Route::post('/flower/sort_down','FlowerController@sort_down');
    Route::post('/flower','FlowerController@store');
    Route::patch('/flower/{id}','FlowerController@update');
    Route::delete('/flower/{id}','FlowerController@delete');


    // camp
    Route::get('/booking/camp','CampController@index');
    Route::post('/booking/camp','CampController@store');
    Route::patch('/booking/camp/{id}','CampController@update');
    Route::delete('/booking/camp/{id}','CampController@delete');

    // restaurant
    Route::get('/booking/restaurant','RestaurantController@index');
    Route::post('/booking/restaurant','RestaurantController@store');
    Route::patch('/booking/restaurant/{id}','RestaurantController@update');
    Route::delete('/booking/restaurant/{id}','RestaurantController@delete');

    // customer
    Route::get('/customer','CustomerController@index');
    Route::post('/customer','CustomerController@store');
    Route::patch('/customer/{id}','CustomerController@update');
    Route::delete('/customer/{id}','CustomerController@delete');
});



