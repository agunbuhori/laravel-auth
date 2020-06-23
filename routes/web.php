<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);
Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/callback/{provider}', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'HomeController@index');
Route::get('/kelas', 'HomeController@index');
Route::get('/kelas/{code}', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'Auth\LoginController@logout');
});