@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Détails de la note de frais #{{ $expense_report->id }}
                </div>
                <div class="card-body">
                    <table border=1>
                        <tr>
                            <td>date</td>
                            <td>{{ $expense_report->date_expense }}</td>
                        </tr>
                        <tr>
                            <td>montant</td>
                            <td>{{ $expense_report->amount }}</td>
                        </tr>
                        <tr>
                            <td>établissement</td>
                            <td>{{ $expense_report->provider }}</td>
                        </tr>
                        <tr>
                            <td>détails</td>
                            <td>{{ $expense_report->details }}</td>
                        </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

