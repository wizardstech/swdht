@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Détails de la note de frais 
                </div>
                <div class="card-body">
                   <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Date</th>
                          <th scope="col">Montant</th>
                          <th scope="col">Etablissement</th>
                          <th scope="col">Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">{{ $expenseReport->id }}</th>
                          <td>{{ $expenseReport->date_expense }}</td>
                          <td>{{ $expenseReport->amount }}</td>
                          <td>{{ $expenseReport->provider }}</td>
                          <td>{{ $expenseReport->details }}</td>
                        </tr>
                        <tr>
                                                                <a target="_blank" href="{{ url($pathToFile) }}">
                                    {{ basename($pathToFile) }}<!-- img style="width:50%" class="img" src="{{ url($pathToFile) }}"-->
                                    </a>
                        </tr>
                      </tbody>
                    </table>
                </div>
            <a href='{{ route('modify_expense_report', ['id' => $expenseReport->id]) }}'><button type="button" class="btn btn-secondary btn-lg btn-block">Edit</button></a>
            </div>
        </div>
    </div>
</div>
@endsection

