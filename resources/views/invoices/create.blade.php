@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
      <div class="card-content">
        <p class="title">
            {{ __('app.new_invoice') }}
        </p>
        <a class="button m-bottom" href="{{ route('invoices.index') }}">
          <i class="material-icons">keyboard_backspace</i>Go back
        </a>
        {!! Form::open(['route' => 'invoices.store', 'files'=>true]) !!}
          <div class="field">
            <label class="label">{{ __('fields.title') }}</label>
            {{ Form::text('title', null, [
              'class' => 'input',
              'placeholder' => 'Invoice title',
              'required' =>  'required'
              ]) }}
          </div>
          <div class="field">
            <label class="label">Description</label>
            {{ Form::textarea('description', null, [
              'class' => 'textarea',
              'placeholder' => 'Description and informations',
              'required' =>  'required'
              ]) }}
          </div>
          <div class="field">
            <label class="label">{{ __('fields.amount') }}</label>
            {{ Form::text('amount', null, [
              'class' => 'input',
              'placeholder' => 'Amount',
              'required' =>  'required'
              ]) }}
          </div>
          <div class="field">
            <label class="label">Date</label>
            {{ Form::date('date', null, [
              'class' => 'input',
              'id' => 'datepicker',
              'required' =>  'required'
              ]) }}
          </div>
          <div class="field">
            <label class="label">Facture</label>
            {{ Form::file('document') }}
          </div>
            {{ Form::submit('Save !', ['class' => 'button']) }}
        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
