<?php

namespace App\Http\Controllers;

use App\Document;
use App\ExpenseReport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ExpenseReportsController extends Controller
{
  public function index()
  {
      if(Auth::user()->role == 'user'){
        $expenseReports = ExpenseReport::where('user_id','=',Auth::id())->get();
        
      }
      elseif(Auth::user()->role == 'admin')
      {
          $expenseReports = DB::table('expense_reports')->paginate(10);
      }
    return view('expense-reports/index', ['expenseReports' => $expenseReports]);
  }

  public function show(Request $request)
  {
    $user_id = ExpenseReport::where('id','=',$request->id)->value('user_id');
    $expenseReport = ExpenseReport::findOrFail($request->id);
    $documents = Document::where('expense_id','=',$request->id)->get();

    if(Auth::id() !== $user_id)
    {
        return redirect('home');
    }

  	return view('expense-reports/show', ['expenseReport' => $expenseReport, 'idExpenseReport' => $request->id, 'documents' => $documents]);
  }

  public function open_doc(Request $request)
  {
    //if user see doc
      return response()->file(str_replace('/', '\\', storage_path().'/app/'.$request->document));
    //if admin download doc
      //return response()->download(str_replace('/', '\\', storage_path().'/app/'.$request->document, $request->document_name);
  }


  public function new()
  {
  	return view('expense-reports/form');
  }

  public function modify(Request $request)
  {

    $user_id = ExpenseReport::where('id','=',$request->id)->value('user_id');
    $expenseReport = ExpenseReport::findOrFail($request->id);
    $documents = Document::where('expense_id','=',$request->id)->get();

    if(Auth::id() !== $user_id)
      {
          return redirect('home');
      }

    return view('expense-reports/form', [
      'expenseReport' => $expenseReport,
      'documents'=>$documents
    ]);
  }

  public function save(Request $request)
  {
    $request->validate
    ([
        'amount' => 'required|numeric|between:0,100000',
        'details' => 'required',
        'provider' => 'required',
        'date_expense' =>'required',
    ]);

    if (isset($request->expense_report_id))
    {
      $expenseReport = ExpenseReport::findOrFail($request->expense_report_id);
    }
    else
    {
      $expenseReport = new ExpenseReport;
      $expenseReport->user_id = Auth::id();
      $expenseReport->state = 'En attente';
    }

    $expenseReport->amount = $request->input('amount');
    $expenseReport->date_expense = $request->input('date_expense');
    $expenseReport->provider = $request->input('provider');
    $expenseReport->details = $request->input('details');

    $expenseReport->save();

    foreach ($request->file() as $key => $value) {
      $request->validate(['mimeType' => 'mimes:jpeg,jpg,png']);
      $documents = new Document;
      $documents->expense_id = $expenseReport->id;
      $documents->document_name = $request->file($key)->getClientOriginalName();
      $documents->document = $request->file($key)->store('documents');
      $documents->save();
    }
    return redirect('expense_reports')->with('status', 'Note de frais enregistrée !');
  }


  public function delete(Request $request)
  {
    if(Auth::id() !== $request->id)
    {
        redirect('home');
    }
    $documents = Document::where('expense_id','=',$request->id)->delete();
    $expenseReport = ExpenseReport::findOrFail($request->id)->delete();
    return redirect('expense_reports')->with('status', 'Note de frais supprimée !');
  }


  public function delete_document(Request $request)
  {
    if(Auth::id() !== $request->id)
    {
        redirect('home');
    }
    $document = Document::where('id','=',$request->id)->delete();

    if($document === 1)
    {
      return  response('OK', 200)->header('Content-Type', 'text/plain');
    }
    return response('Wrong ID', 500)->header('Content-Type', 'text/plain');
  }

}