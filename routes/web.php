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

Route::get('/home', 'crudController@index')->name('home');

///////////////
//Post
Route::resource('/dashboard', 'crudController');
Route::delete('deleteAll', 'crudController@deleteAll');

//edit

//delete route 

