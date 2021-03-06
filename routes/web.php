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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'file-manage', 'as' => 'file-manage.'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'FileManageController@index']);
    Route::post('/uploadcontent', ['as' => 'uploadcontent', 'uses' => 'FileManageController@uploadContent']);
});