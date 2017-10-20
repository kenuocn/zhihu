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


//前台模块
Route::group(['namespace' => 'Home'], function (){

    Route::get('/user', 'UserController@index');

    Route::get('/email/verify/{token}',['as'=>'email.verify', 'uses'=>'EmailController@verify']);

    Route::resource('questions','QuestionsController');

});


