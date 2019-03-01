@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
      <div class="card-content">
        <div class="columns">
        <p class="title">
            {{ $invoice->title }}
        </p>
        {{ $invoice->description }}
      </div>
  </div>
</div>
@endsection
