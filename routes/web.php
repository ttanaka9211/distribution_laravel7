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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/setting/password/change', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
Route::post('/setting/password/change', 'Auth\ChangePasswordController@ChangePassword')->name('password.change');
Route::get('/setting/deactive', 'Auth\DeactiveController@showDeactiveForm')->name('deactive.form');
Route::post('/setting/deactive', 'Auth\DeactiveController@deactive')->name('deactive');
Route::get('/setting', 'SettingController@index')->name('setting');
Route::get('/setting/name', 'SettingController@showChangeNameForm')->name('name.form');
Route::post('/setting/name', 'SettingController@changeName')->name('name.change');
Route::get('/setting/email', 'SettingController@showChangeEmailForm')->name('email.form');
Route::post('/setting/email', 'SettingController@changeEmail')->name('email.change');

//posts
Route::get('/', 'PostsController@index')->name('top');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store']]);
