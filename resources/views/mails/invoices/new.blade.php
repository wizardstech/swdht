@extends('mails.layouts.mail')

@section('title','New invoice')

@section('toptext')
<p>{{ $owner->fullname }} added a new invoice</p>
@endsection

@section('bottomtext')
<p>Title : {{ $invoice->title }} </p>
@endsection

@section('actionlink',route('invoices.show', ['id' => $invoice->id]))

@section('actiontext',"Link to the invoice")
