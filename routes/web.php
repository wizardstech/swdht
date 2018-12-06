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
    return view('welcome');
});

/*Route::get('/expense_reports', function(){
	return view('expense_reports');
});*/
Route::get('/expense_reports', 'ExpenseReportsController@index')->name('expense_reports');

Route::get('/expense_report/{id}', 'ExpenseReportsController@show')->name('show_expense_report');

Route::get('/delete_expense_report/{id}', 'ExpenseReportsController@delete')->name('delete_expense_report');

Route::get('/new_expense_report', 'ExpenseReportsController@new')->name('new_expense_report');

Route::get('/modify_expense_report/{id}', 'ExpenseReportsController@modify')->name('modify_expense_report');

Route::post('/save_expense_report', 'ExpenseReportsController@save')->name('save_expense_report');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

