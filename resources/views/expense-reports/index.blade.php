@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Notes de frais
                </div>
                <div class="card-body">
                    <a href='/new_expense_report'>Déclarer une nouvelle note de frais</a>
                    <br><br>
                    <table border=1>
                        <tr>
                            <th>amount</th>
                            <th>provider</th>
                            <th>personne</th>
                            <th>date</th>
                            <th colspan=3>actions</th>
                        </tr>
                        @foreach ($expenseReports as $expenseReport)
                        <tr>
                            <td>{{ $expenseReport->amount }}</td>
                            <td>{{ $expenseReport->provider}}</td>
                            <td>{{ $expenseReport->user->name }}</td>
                            <td>{{ $expenseReport->date_expense}}</td>
                            <td><a href='{{ route('show_expense_report', ['id' => $expenseReport->id]) }}'>view</a></td>
                            <td><a href='{{ route('modify_expense_report', ['id' => $expenseReport->id]) }}'>edit</a></td>
                            <td><a onclick='return confirm("Voulez-vous vraiment supprimer DEFINITIVEMENT cette note de frais ?")' 
                                href='{{ route('delete_expense_report', ['id' => $expenseReport->id]) }}'>delete</a></td>
                        </tr>
                        @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

