@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Déclarer une nouvelle note de frais
                </div>
                <div class="card-body">
                @if (isset($expense_report))
                    {!! Form::model($expense_report, ['url'=>'save_expense_report']) !!}
                        {!! Form::hidden('expense_report_id', $expense_report->id) !!}
                @else
                    {!! Form::open(['url'=>'save_expense_report']) !!}
                @endif
                    <table>
                    	<tr>
	                    	<td>{!! Form::label('amount', 'Montant') !!}</td>
	                    	<td>{!! Form::number('amount', null, ['step' => '0.01']) !!}</td>
                    	</tr>
                    	<tr>
	                    	<td>{!! Form::label('provider', 'Etablissement') !!}</td>
	                    	<td>{!! Form::text('provider') !!}</td>
                    	</tr>
                    	<tr>
	                    	<td>{!! Form::label('date_expense', 'Date') !!}</td>
	                    	<td>{!! Form::date('date_expense') !!}</td>
                    	</tr>
                    	<tr>
	                    	<td>{!! Form::label('details', 'Description') !!}</td>
	                    	<td>{!! Form::textarea('details', null,['placeholder' => 'Indiquez la nature de la dépense, les personne concernées, ou tout détail concernant la note de frais']) !!}</td>
	                    </tr>
                        <tr>
                            <td>{!! Form::label('document', 'Justificatif') !!}</td>
                            <td>{!! Form::file('document') !!}</td>
                        </tr>
	                    <tr>
	                    	<td colspan=2>{!! Form::submit('Valider') !!}</td>
	                    </tr>
                   	</table>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

