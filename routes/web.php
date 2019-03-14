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

    // Invoice
    Route::resource('/invoices', 'InvoiceController');
    Route::get('/invoice/{id}/setStatus', 'InvoiceController@setStatus')->name('invoice_status');

    // Absence
    Route::resource('/absences', 'AbsenceController');

    // Home
    Route::get('/', 'HomeController@index')->name('home');

    // Profile
    Route::get('/profile/{username}', 'UserController@profile')->name('profile');
    Route::get('/profile/edit', 'UserController@editProfile')->name('profile_edit');

    Route::get('/notifications', 'UserController@indexNotifications')->name('notifications_index');

    Route::get('/download/{id}', 'DownloadMediaController@downloadInvoice')->name('download_invoice');
    Route::get('/medias/{id}', 'DownloadMediaController@getInvoiceImage')->name('get_private_image');

});

Route::group(['middleware' => ['role:superadmin']], function () {

    // Admin
    Route::get('/admin','AdminController@index')->name('admin');
});
