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
                          
                          <!-- <th scope="col">#</th> -->
                          <th style="width: 5%" scope="col">Montant</th>
                          <th style="width: 20%" scope="col">Date</th>
                          <th style="width: 20%" scope="col">Etablissement</th>
                          <th style="width: 35%" scope="col">Details</th>
                          <th style="width: 20%" scope="col">File</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <!-- <th scope="rowgroup">{{ $expenseReport->id }}</th> -->
                          <td>{{ $expenseReport->amount }}</td>
                          <td>{{ $expenseReport->date_expense }}</td>
                          <td>{{ $expenseReport->provider }}</td>
                          <td>{{ $expenseReport->details }}</td>
                          <td>
                              @foreach ($documents as $document)
                                <a target="_blank" href='{{ route('open_supporting_documents',['document' => $document -> document]) }}'> {{ $document -> document_name}} <br></a>
                              @endforeach
                          </td>
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