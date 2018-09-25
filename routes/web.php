<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/add', 'HomeController@add');
Route::post('/add/post', 'HomeController@add_post');
Route::get('/requests', 'HomeController@requests');
Route::get('/report', 'HomeController@reports');
Route::get('/requests/follow-up/32789{id}43789721', 'HomeController@follow');
Route::get('/requests/follow-up/32789{id}43789721/edit', 'HomeController@edit_budget');
Route::get('/requests/follow-up/32789{id}43789721/settle', 'HomeController@settle');
Route::post('/requests/follow-up/32789{id}43789721/settle/post', 'HomeController@settle_post');

Route::get('/approve/329382329383293823983238{id}874393239328923982378923782739237', 'HomeController@approve');
Route::post('/approve/329382329383293823983238{id}874393239328923982378923782739237/go', 'HomeController@approve_post');
Route::post('/approve/329382329383293823983238{id}874393239328923982378923782739237/reject', 'HomeController@reject_post');
Route::post('/approve/329382329383293823983238{id}874393239328923982378923782739237/return', 'HomeController@return_post');
Route::get('/approved/',function () {
    return view('approved');
});

//Admin
Route::post('/create-user-post', 'AdminController@add_user');

Route::get('/register-user', 'AdminController@create_user');
