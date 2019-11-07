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
    return view('admin.files.create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/files', 'UserFileController')->only([
    'index', 'create', 'store'
])->middleware('auth');
