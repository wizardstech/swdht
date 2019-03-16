@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-content">
      <h3> {{ __('messages.welcome') }} </h4>
      <blockquote> "{{ $chuck['value'] }}" </blockquote>
    </div>
  </div>
</div>
@endsection
