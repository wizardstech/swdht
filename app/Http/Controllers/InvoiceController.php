<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\NewInvoice as NewInvoiceDB;
use App\Mail\NewInvoice as NewInvoiceMail;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $filter = $request->input('filter');
        $userIsAdmin = \Auth::user()->hasAnyRole(['superadmin','inquisitor']);

        $invoices = Invoice::when($filter, function($query, $filter){
            return $query->where('status', $filter);
        })->when(!$userIsAdmin, function($query, $userIsAdmin){
            return $query->where('owner', \Auth::id());
        })->paginate(10);

        return view('invoices.index', compact('invoices'));
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
            'date' => 'date_format:d/m/Y|required',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'document' => 'required'
        ]);

        $invoice = new Invoice;

        $invoice->title =$request->get('title');
        $invoice->description = $request->get('description');
        $invoice->owner = \Auth::id();
        $invoice->date = date_create_from_format('d/m/Y', $request->get('date'));
        $invoice->amount = $request->get('amount');
        $invoice->status = 'pending';
        $invoice->save();

        $invoice
        ->addMediaFromRequest('document')
        ->withResponsiveImages()
        ->toMediaCollection('invoice');

        $superadmins = User::getAdmins();

        $message = \Auth::user()->fullname.' added a new invoice';

        \Notification::send($superadmins,new NewInvoiceDB($invoice, $message));
        \Mail::to($superadmins)->send(new NewInvoiceMail($invoice, \Auth::user()));

        $request->session()->flash('message.status', 'primary');
        $request->session()->flash('message.body', __('app.new_invoice_flash'));

        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        if (\Auth::user()->hasAnyRole(['superadmin','inquisitor']) || \Auth::id() === $invoice->owner) {

            $fileType = $invoice->getFirstMedia('invoice')->mime_type;
            $download = true;

            if($fileType === 'image/jpeg' || $fileType === 'image/png'){
                $download = false;
            }

            return view('invoices.show', compact('invoice','download'));
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
    public function destroy(Request $request, Invoice $invoice)
    {
        $invoice->delete();

        $request->session()->flash('message.status', 'danger');
        $request->session()->flash('message.body', __('app.delete_invoice_flash'));

         return redirect()->route('invoices.index');
    }

    public function setStatus(Request $request, $id){

        $invoice = Invoice::whereId($id)->firstOrFail();

        if(!\Auth::user()->hasAnyRole(['superadmin','inquisitor'])){
            return redirect()->route('invoices.show', ['id' => $invoice->id]);
        }

        $status = $request->input('status');

        if(in_array($status, Invoice::STATUS)){
            $invoice->status = $status;
            $invoice->save();

            $request->session()->flash('message.status', 'primary');
            $request->session()->flash('message.body', __('app.invoice_status_change'));

        }

        return redirect()->route('invoices.show', ['id' => $invoice->id]);
    }
}
