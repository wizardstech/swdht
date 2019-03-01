<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::where('owner',\Auth::id())->paginate(10);
        return view('invoices.index', ['invoices'=>$invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=> 'required',
            'date' => 'date_format:d/m/Y|required'
        ]);

        $invoice = new Invoice;
        $invoice->title =$request->get('title');
        $invoice->description = $request->get('description');
        $invoice->owner = \Auth::id();
        $invoice->date = date_create_from_format('d/m/Y',$request->get('date'));
        $invoice->save();

        return redirect()->route('invoices.index')->with('success', 'Invoice has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        if(\Auth::user()->hasRole('superadmin') || \Auth::id() === $invoice->owner){
            return view('invoices.show', ['invoice' => $invoice]);
        }

        return redirect()->route('invoices.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
