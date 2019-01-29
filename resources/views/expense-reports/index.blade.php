@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Notes de frais
                </div>
                <div class="card-body">
                   <a href='/new_expense_report' class="btn btn-outline-primary">Déclarer une nouvelle note de frais</a>
                    <br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 8%" >Montant</th>
                                <th style="width: 18%" >Date</th>
                                <th style="width: 20%" >Etablissement</th>
                                <th style="width: 15%" >Etat</th>
                                <th style="width: 38%" colspan=3><center>Actions</center></th> <!-- recentrer action sur le edit -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenseReports as $expenseReport)
                                <tr>
                                    <td>{{ $expenseReport->amount }}</td>
                                    <td>{{ $expenseReport->date_expense }}</td>
                                    <td style="word-wrap: break-word">{{ $expenseReport->provider }}</td>
                                    <td>{{ $expenseReport->state }}</td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                                        <td><a href='{{ route('show_expense_report', ['id' => $expenseReport->id]) }}' class="btn btn-outline-primary">View</a></td>

                                        @if($expenseReport->state === 'En attente')
                                            <td><a href='{{ route('modify_expense_report', ['id' => $expenseReport->id]) }}' class="btn btn-outline-primary">Edit</a></td>
                                            <td><a onclick="return confirm('Est-ce votre dernier mot?');" href='{{ route('delete_expense_report', ['id' => $expenseReport->id]) }}' class="btn btn-outline-primary">Delete</a></td>
                                        @endif
                                      
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

