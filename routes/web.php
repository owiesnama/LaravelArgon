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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/github', 'Auth\OauthController@redirectToProvider')->name('github');
Route::get('auth/github/register', 'Auth\OauthController@handleProviderCallback');

Route::get('/profile','ProfileController@index');
Route::patch('/profile/{user?}','ProfileController@update');