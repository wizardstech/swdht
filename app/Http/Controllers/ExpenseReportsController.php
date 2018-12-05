<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExpenseReportsController extends Controller
{
    public function index()
    {
		// Ici se trouvera le code qui récupèrera la liste des users
		// la variable $users contient une liste d'articles
        if(Auth::user()->role == 'user'){
            $expense_reports = ExpenseReport::where('user_id','=',Auth::id())->get();
        }elseif(Auth::user()->role == 'admin'){
            $expense_reports = ExpenseReport::all();
        }
        
    	//var_dump($users)

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
        $request->validate
        ([
            'amount' => 'required|numeric|digits_between:1,10',
            'details' => 'required',
            'provider' => 'required',
            'document' => 'mimes:jpeg,jpg,png|max:500000',
            'date_expense' =>'required',
        ]);

    	// gestion de l'update
    	if (isset($request->expense_report_id))
    		$expense_report = ExpenseReport::findOrFail($request->expense_report_id);
    	else
	    	$expense_report = new ExpenseReport;

    	$expense_report->amount = $request->input('amount');
    	$expense_report->provider = $request->input('provider');
    	$expense_report->date_expense = $request->input('date_expense');
    	$expense_report->details = $request->input('details');
        if(!isset($request->expense_report_id))
    	   $expense_report->user_id = Auth::id();
    	if($request->file('document'))
    	 {
            // Sauvegarder l'document sur le serveur
            // Donner le chemin de l'document à l'objet $expense_report instancié
        $expense_report->url_image = $request->file('document')->store('documents');
        }
        /*else($expense_report->file('document'))
        {

        }*/
        
    	$expense_report->save();

    	return redirect('expense_reports')->with('status', 'Note de frais enregistrée !');
    }

    public function modify(Request $request)
    {

    	$expense_report = ExpenseReport::findOrFail($request->id);
    	$fileExists = Storage::disk('local')->exists($expense_report->url_image);
    	if($fileExists){
    		$pathToFile = Storage::disk('local')->url($expense_report->url_image); 
    	}else{
            $pathToFile = false;
        }

    	return view('form_expense_report', ['expense_report' => $expense_report,'fileExists'=>$fileExists,'pathToFile'=>$pathToFile]);
    }

	public function delete(Request $request)
    {
    	$expense_report = ExpenseReport::findOrFail($request->id);

    	$expense_report->delete();

    	return redirect('expense_reports')->with('status', 'Note de frais supprimée !');
    }

}
