@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-content">
      <div class="columns">
        <p class="title column is-four-fifths">
          {{ __('app.invoice') }}
        </p>
        <a href="{{ route('invoices.create') }}" class="button">{{ __('app.add_new_invoice')}}</a>
      </div>

      <table class="table is-hoverable is-fullwidth">
       <thead>
        <tr>
          <th>{{ __('fields.title') }}</th>
          <th>Date</th>
          <th>{{ __('fields.status') }}</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($invoices as $invoice)
        <tr>
          <td>{{ $invoice->title }}</td>
          <td>{{ $invoice->date->format('d M y') }}</td>
          <td>
            @if( $invoice->status === 'pending')
            <span class="tag is-warning">{{__('app.pending')}}</span>
            @elseif( $invoice->status === 'validated')
            <span class="tag is-success">{{__('app.validated')}}</span>
            @else
            <span class="tag is-danger">{{__('app.denied')}}</span>
            @endif
          </td>
          <td>
            <a class="button" href="{{ route('invoices.show', ['id' => $invoice->id]) }}">
              {{ __('app.show')}}
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td>{{ __('app.no_invoice') }}</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $invoices->links() }}
  </div>
</div>
</div>
@endsection
