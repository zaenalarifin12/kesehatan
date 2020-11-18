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

Route::group(["middleware" => ["auth"]], function(){
    Route::get('/', function () { return redirect("/pendaftaran"); });
    
    Route::resource('/pendaftaran',                 "PendaftaranController");
    Route::resource('/pemberkasan',                 "PemberkasanController");
    Route::resource('/rekomendasi',                 "SuratRekomendasiController");
    
    Route::get('/rekomendasi/{id}/cetak',           "SuratRekomendasiController@cetak");
    Route::put('/rekomendasi/{id}/accKabid',        "SuratRekomendasiController@accKabid");
    Route::put('/rekomendasi/{id}/accKepala',       "SuratRekomendasiController@accKepala");
    Route::resource('/sip',                         "SipController");
    Route::put('/sip/{id}/accKabid',                "SipController@accKabid");
    Route::put('/sip/{id}/accKepala',               "SipController@accKepala");
    Route::get('/sip/{id}/cetak',                   "SipController@cetak");
    Route::resource('/users',                       "UserController");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
