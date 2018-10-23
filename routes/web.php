<?php
Auth::routes();
Route::get('/', 'HomeController@masuk');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/kelolaaom', 'KelolaAomController@index')->name('aom');
    Route::get('/kelolaaom/pdf', 'KelolaAomController@export_pdf')->name('eksportAom');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
    Route::resource('chart', 'ChartController');
    Route::resource('keloladata', 'KelolaDataController');
    Route::post('import', 'KelolaDataController@import')->name('import');

});
