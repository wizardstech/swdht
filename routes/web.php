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


// entites : users, expense_reports
//-> pour chaque entite = une migration
// CRUD : create, read, update, delete
// create (INSERT INTO) : un template avec un formulaire (un champ dans le form par champ dans la BDD)
// read ( SELECT ): un template avec la liste des elements
// update ( UPDATE TABLE ): un formulaire, presque identique au create, mais qui est pre rempli avec le donées 
// delete ( DELETE ) : un lie qui delete l'entité

// entite 'expense_report' :
// id (INT)
// id_user (INT)
// montant (FLOAT)
// fournisseur_name (VARCHAR 255)
// details (TEXT)
// date_expense (DATE)
// (plus tard : une piece jointe pour le justif)

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
