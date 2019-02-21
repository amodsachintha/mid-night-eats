<?php

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

Auth::routes([
    'verify'=>true
]);

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('oauth.login');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('facebook.callback');
Route::post('/user/password', 'UserController@createPassword')->name('create.password');

Route::get('/', 'HomeController@index')->name('home');

