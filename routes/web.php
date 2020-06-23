<?php

use App\User;
use Illuminate\Support\Facades\Mail;
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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/callback/{provider}', 'Auth\LoginController@handleProviderCallback');

Route::any('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->middleware('verified');
});

Route::get('/lang', function () {

$translates = DB::table('translates')->where('language_code', 'en')->pluck('key', 'value');
return $translates;
});

Route::get('/test/{id}', function($id) {
    $user = User::findOrFail($id);

    Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
        $m->from('alhimmahmedia@gmail.com', 'Your Application');

        $m->to($user->email, $user->name)->subject('Your Reminder!');
    });
});