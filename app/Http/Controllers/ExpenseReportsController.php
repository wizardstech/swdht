<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ExpenseReport;
use Illuminate\Support\Facades\Auth;

class ExpenseReportsController extends Controller
{
    public function index()
    {
		// Ici se trouvera le code qui récupèrera la liste des users
		// la variable $users contient une liste d'articles

    	$expense_reports = ExpenseReport::all();

    	//var_dump($users);

	    return view('expense_reports', ['expense_reports' => $expense_reports]); // La vue users aura accès à la liste sous le nom listeUsers
    }

    public function show(Request $request)
    {
    	$expense_report = ExpenseReport::findOrFail($request->id);

    	return view('show_expense_report', ['expense_report' => $expense_report]);
    }

    public function new()
    {
    	return view('form_expense_report');
    }

    public function save(Request $request)
    {

    	// gestion de l'update
    	if (isset($request->expense_report_id))
    		$expense_report = ExpenseReport::findOrFail($request->expense_report_id);
    	else
	    	$expense_report = new ExpenseReport;

    	$expense_report->amount = $request->input('amount');
    	$expense_report->provider = $request->input('provider');
    	$expense_report->date_expense = $request->input('date_expense');
    	$expense_report->details = $request->input('details');
    	$expense_report->user_id = Auth::id();

    	$expense_report->save();

    	return redirect('expense_reports')->with('status', 'Note de frais enregistrée !');
    }

    public function modify(Request $request)
    {
    	$expense_report = ExpenseReport::findOrFail($request->id);

    	return view('form_expense_report', ['expense_report' => $expense_report]);
    }

	public function delete(Request $request)
    {
    	$expense_report = ExpenseReport::findOrFail($request->id);

    	$expense_report->delete();

    	return redirect('expense_reports')->with('status', 'Note de frais supprimée !');
    }
}
