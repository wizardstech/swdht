@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-content">
      <p class="title">
        {{ $invoice->title }}
      </p>
      <a class="button m-bottom" href="{{ route('invoices.index') }}">
        <i class="material-icons">keyboard_backspace</i>Go back
      </a>
      @hasanyrole('inquisitor|superadmin')
      <p class="label"> {{ __('app.applicant') }} :</p>
      {{ $invoice->user->fullname }}
      @endhasanyrole
      <p class="label"> {{ __('fields.status') }} </p>
      @if( $invoice->status === 'pending')
      <span class="tag is-warning">{{__('app.pending')}}</span>
      @elseif( $invoice->status === 'validated')
      <span class="tag is-success">{{__('app.validated')}}</span>
      @else
      <span class="tag is-danger">{{__('app.denied')}}</span>
      @endif
      <p class="label"> Description :</p>
      {{ $invoice->description }}
      <p class="label"> Date :</p>
      {{ $invoice->date->format('d M y') }}
      <p class="label"> {{ __('fields.files') }} : </p>
      @if( $download )
      <a class="button" href="{{ route('download_invoice', ['id'=>$invoice->id]) }}">
        {{ __('fields.download') }} {{ $invoice->getFirstMedia('invoice')->file_name }}
      </a>
      @else
      <div class="invoice-img">
        <a href="{{ url('medias/'.$invoice->getFirstMedia('invoice')->id) }}">
          <img src="{{ url('medias/'.$invoice->getFirstMedia('invoice')->id) }}">
        </a>
        <br>
        <a class="button" href="{{ route('download_invoice', ['id'=>$invoice->id]) }}">
          {{ __('fields.download') }} {{ $invoice->getFirstMedia('invoice')->file_name }}
        </a>
      </div>
      @endif
      <div class="has-text-centered m-top">
      @hasanyrole('inquisitor|superadmin')
      <a href="{{ route('invoice_status', ['id' => $invoice->id, 'status' => 'validated' ])}}" class="button is-success"> {{ __('app.validate_invoice') }} </a>
      <a href="{{ route('invoice_status', ['id' => $invoice, 'status' => 'denied' ])}}" class="button is-danger"> {{ __('app.denied_invoice') }} </a>
      @endhasanyrole
      @if( $invoice->status === 'pending' || Auth::user()->hasAnyRole(['inquisitor','superadmin']))
      <a class="button is-danger" id="delete-modal"> Delete </a>
      @endif
      </div>
    </div>
  </div>
  @include('parts.modal_delete', [
    'delete_route' => route('invoices.destroy', ['id' => $invoice->id]),
    'modal_message' => 'Are you sure to delete this invoice ?',
    'modal_title' => 'Delete an invoice'
    ])
</div>
@endsection
