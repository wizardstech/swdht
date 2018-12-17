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
        if(Auth::user()->role == 'user'){
            $expenseReports = ExpenseReport::where('user_id','=',Auth::id())->get();
        }elseif(Auth::user()->role == 'admin'){
            $expenseReports = ExpenseReport::all();
        }

	    return view('expense-reports/index', ['expenseReports' => $expenseReports]);
    }

    public function show(Request $request)
    {
    	$expenseReport = ExpenseReport::findOrFail($request->id);

    	return view('expense-reports/show', ['expenseReport' => $expenseReport]);
    }

    public function new()
    {
    	return view('expense-reports/form');
    }

    public function save(Request $request)
    {
        $request->validate
        ([
            'amount' => 'required|numeric|digits_between:1,10',
            'details' => 'required',
            'provider' => 'required',
            //'document' => 'mimes:jpeg,jpg,png',
            'date_expense' =>'required',
        ]);

        if (isset($request->expense_report_id))
          $expenseReport = ExpenseReport::findOrFail($request->expense_report_id);
      else
          $expenseReport = new ExpenseReport;

      if(!isset($request->expense_report_id))
        $expenseReport->user_id = Auth::id();

      $expenseReport->amount = $request->input('amount');
      $expenseReport->provider = $request->input('provider');
      $expenseReport->date_expense = $request->input('date_expense');
      $expenseReport->details = $request->input('details');


    if($request->file('document'))
    { 
        if (Storage::disk('local')->exists($expenseReport->url_image)) 
        {
            Storage::delete($expenseReport->url_image);
        }
        $expenseReport->url_image = $request->file('document')->store('documents'); 
    }



    $expenseReport->save();

    return redirect('expense_reports')->with('status', 'Note de frais enregistrée !');
}

public function modify(Request $request)
{
  if(Auth::id() !== $request->id){
      redirect('home');
  }
   $expenseReport = ExpenseReport::findOrFail($request->id);
   $fileExists = Storage::disk('local')->exists($expenseReport->url_image);
   if($fileExists){
      $pathToFile = Storage::disk('local')->url($expenseReport->url_image); 
  }else{
    $pathToFile = false;
}

return view('expense-reports/form', ['expenseReport' => $expenseReport,'fileExists'=>$fileExists,'pathToFile'=>$pathToFile]);
}

public function delete(Request $request)
{
  if(Auth::id() !== $request->id){
      redirect('home');
  }
   $expenseReport = ExpenseReport::findOrFail($request->id);

   $expenseReport->delete();

   return redirect('expense_reports')->with('status', 'Note de frais supprimée !');
}

}
