@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
      <div class="card-content">
        <p class="title">
            Edit invoice {{ $invoice->title }}
        </p>
        {!! Form::model($invoice, ['route' => ['invoices.update', $invoice->id]]) !!}
            {{ Form::text('username') }}
        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
