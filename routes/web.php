<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@masuk');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/', 'KelolaDataController@index');
    // Route::get('/home', 'KelolaDataController@index')->name('home');
    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
    Route::resource('chart', 'ChartController');
    Route::resource('keloladata', 'KelolaDataController');
    Route::post('import', 'KelolaDataController@import')->name('import');
    Route::get('/kelolaaom/pdf', 'KelolaAomController@export_pdf')->name('eksportAom');
    Route::get('/kelolaaom/coba', 'KelolaAomController@kirimEmailSemua')->name('email');



    Route::group(['middleware' => ['auth', 'role:bisnis']], function () {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/geolokasi', function () {
            return view("homeGeolokasi");
        })->name('geolokasi');
        // Route::get()->name('statNOA');
        // Route::get()->name('statNOM');
        // Route::get()->name('statdeltaOSNPLBUlan');
        // Route::get()->name('statdeltaOSNPLHARI');
        // Route::get()->name('statNPL');
        // Route::get()->name('statOSPAR');
        // Route::get()->name('statPARBULAN');
        // Route::get()->name('statOSBULAN');
        // Route::get()->name('statOS');
        // Route::get()->name('statKOL2');
        // Route::get()->name('statLendingNOA');
    });


    // Route::group(['middleware' => ['auth', 'role:AOM']], function () {
    Route::get('/kelolaaom', 'KelolaAomController@index')->name('aom');
    Route::get('/emailkeaom', 'KelolaAomController@kirimEmailSemua')->name('emailaom');
    Route::get('/kelolaaom/{awal}/{akhir}', 'KelolaAomController@cariDariTanggal')->name('tglaom');
    Route::get('/kelolaaom/cetakpdf/{awal}/{akhir}', 'KelolaAomController@export_pdfDownload')->name('cetakpdf');
    Route::get('/kelolaaom/cetakpdf/{awal}/{akhir}', 'KelolaAomController@export_pdfDownload')->name('cetakpdf');
    // Route::get('/', 'KelolaAomController@index');
    // Route::get('/home', 'KelolaAomController@index')->name('home');
    // });

});
