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
});
