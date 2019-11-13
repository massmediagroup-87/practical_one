<?php

Route::get('/', function () {
    return redirect()->route('files.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('/files', 'UserFileController')->except([
        'edit', 'update'
    ]);

    Route::resource('temp', 'TempLinkController')->only([
        'index', 'show', 'destroy'
    ]);

    Route::get('report', 'ReportUserFilesController');
    Route::get('file/{file}', 'FileLinkController')->name('file.name');
    Route::get('temporary/{file}', 'TempStoreController')->name('temporary.store');

});
