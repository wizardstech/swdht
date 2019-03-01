@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
      <div class="card-content">
        <div class="columns">
        <p class="title column is-four-fifths">
            Invoices
        </p>
        <a href="{{ route('invoices.create') }}" class="button"> Add new invoice </a>
        </div>

        <table class="table is-hoverable is-fullwidth">
             <thead>
                <tr>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->title }}</td>
                    <td>{{ $invoice->title }}</td>
                    <td>{{ $invoice->title }}</td>
                    <td><a class="button" href="{{ route('invoices.show', ['id' => $invoice->id]) }}">View</a></td>
                </tr>
                @empty
                <tr><td>You have no invoice at this moment</td></tr>
                @endforelse
              </tbody>
        </table>
        {{ $invoices->links() }}
    </div>
</div>
</div>
@endsection
