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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@view')->name('login');
Route::post('/login/auth', 'LoginController@authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@page')->name('home');
    Route::get('/logout', 'HomeController@logout')->name('logout');
    Route::get('/data-siswa', 'HomeController@datasiswa')->name('datasiswa');
    Route::get('/siswa/{id}', 'HomeController@showSiswa')->name('show.siswa');
    Route::post('/upload', 'HomeController@upload')->name('upload');
    Route::get('/download', 'HomeController@download')->name('download');
    
    Route::prefix('tambah-siswa')->group(function () {
        Route::get('/', 'HomeController@tambahSiswa')->name('tambah.siswa');
        Route::post('/post', 'HomeController@tambahSiswaPost')->name('tambah.siswa.post');
    });
    Route::prefix('hapus-siswa')->group(function () {
        Route::get('/', 'HomeController@hapusSiswa')->name('hapus.siswa');
        Route::get('/confirm', 'HomeController@hapusSiswaConfirm')->name('hapus.siswa.confirm');
        Route::post('/post', 'HomeController@hapusSiswaPost')->name('hapus.siswa.post');
    });
});
