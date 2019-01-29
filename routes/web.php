<?php

Route::get('storage/documents/{filename}', function ($filename)
{
    $path = storage_path('app/documents/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/', function () {
    return view('home');
});

/*Route::get('/expense_reports', function(){
	return view('expense_reports');
});*/
Route::get('/expense_reports', 'ExpenseReportsController@index')->name('expense_reports');

Route::get('/expense_report/{id}', 'ExpenseReportsController@show')->name('show_expense_report');

Route::get('/delete_expense_report/{id}', 'ExpenseReportsController@delete')->name('delete_expense_report');

Route::get('/document/{id}', 'ExpenseReportsController@delete_document')->name('delete_document');

Route::get('/new_expense_report', 'ExpenseReportsController@new')->name('new_expense_report');

Route::get('/modify_expense_report/{id}', 'ExpenseReportsController@modify')->name('modify_expense_report');

Route::post('/save_expense_report', 'ExpenseReportsController@save')->name('save_expense_report');

Route::get('/open_supporting_documents', 'ExpenseReportsController@open_doc')->name('open_supporting_documents');

Route::get('/users', 'UsersController@index')->name('users')->middleware('admin');

Route::get('/users/{id}', 'UsersController@show')->name('show_users')->middleware('admin');

Route::post('/save_users', 'UsersController@save')->name('save_users');

Route::get('/modify_users/{id}', 'UsersController@modify')->name('modify_users')->middleware('admin');

Route::get('/delete_users/{id}', 'UsersController@delete')->name('delete_users');

Route::get('/new_user', 'UsersController@new')->name('new_user');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('welcome');

