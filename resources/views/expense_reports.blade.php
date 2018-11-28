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
                        @foreach ($expense_reports as $expense_report)
                        <tr>
                            <td>{{ $expense_report->amount }}</td>
                            <td>{{ $expense_report->provider}}</td>
                            <td>{{ $expense_report->user->name }}</td>
                            <td>{{ $expense_report->date_expense}}</td>
                            <td><a href='/expense_report/{{ $expense_report->id }}'>view</a></td>
                            <td><a href='/modify_expense_report/{{ $expense_report->id }}'>edit</a></td>
                            <td><a onclick='return confirm("Voulez-vous vraiment supprimer DEFINITIVEMENT cette note de frais ?")' href='/delete_expense_report/{{ $expense_report->id }}'>delete</a></td>
                        </tr>
                        @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

