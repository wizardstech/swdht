@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
      <div class="card-content">
        <p class="title">
            New invoice
        </p>
        {!! Form::open(['route' => 'invoices.store']) !!}

            {{ Form::text('title', null, [
              'class' => 'input',
              'placeholder' => 'Invoice title',
              'required' =>  'required'
              ]) }}
            {{ Form::textarea('description', null, [
              'class' => 'textarea',
              'placeholder' => 'Description and informations',
              'required' =>  'required'
              ]) }}
            {{ Form::date('date', null, [
              'id' => 'datepicker',
              'required' =>  'required'
              ]) }}
            {{ Form::submit('Save !', ['class' => 'button']) }}
        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
