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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name("logout");

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
    // Home
    Route::get('/', 'HomeController@index')->name('home');

    // Profile 
    Route::get('/profile/{username}', 'UserController@profile')->name('profile');
    Route::get('/profile/edit', 'UserController@editProfile')->name('profile-edit');

});

Route::group(['middleware' => ['role:super-admin']], function () {

    // Admin
    Route::get('/admin','AdminController@index')->name('admin');
});