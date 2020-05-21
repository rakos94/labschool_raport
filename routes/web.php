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
    if(Auth::check()) {
        return redirect()->route('home');
    }
    else if(Auth::guard('web-siswa')->check()) {
        return redirect()->route('siswa.home');
    }
    return redirect()->route('siswa.login');
    // return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::prefix('login/admin')->group(function () {
        Route::get('/', 'LoginController@adminView')->name('admin.login');
        Route::post('/auth', 'LoginController@adminAuthenticate');
    });
    Route::prefix('login/siswa')->group(function () {
        Route::get('/', 'LoginController@siswaView')->name('siswa.login');
        Route::post('/auth', 'LoginController@siswaAuthenticate');
    });
});

Route::get('/logout', 'HomeController@logout')->name('logout');

Route::middleware(['auth:web-siswa'])->group(function () {
    Route::prefix('home/siswa')->group(function () {
        Route::get('/', 'HomeController@siswaHome')->name('siswa.home');
    });
    Route::get('/download', 'HomeController@download')->name('siswa.download');
});

Route::middleware(['auth:web'])->prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@page')->name('home');
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
