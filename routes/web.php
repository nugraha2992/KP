<?php
Auth::routes();
Route::get('/', 'HomeController@masuk');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:bisnis']], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('home');

    });
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/', 'KelolaDataController@index');
        Route::get('/home', 'KelolaDataController@index')->name('home');
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');
        Route::resource('products', 'ProductController');
        Route::resource('chart', 'ChartController');
        Route::resource('keloladata', 'KelolaDataController');
        Route::post('import', 'KelolaDataController@import')->name('import');
        Route::get('/kelolaaom/pdf', 'KelolaAomController@export_pdf')->name('eksportAom');
        Route::get('/kelolaaom/coba', 'KelolaAomController@kirimEmailSemua')->name('email');

    });

    Route::group(['middleware' => ['role:bisnis']], function () {
        Route::get('/kelolaaom', 'KelolaAomController@index')->name('aom');
    });

});
