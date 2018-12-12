@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Déclaration d'une nouvelle note de frais
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                @if (isset($expenseReport))
                    {!! Form::model($expenseReport, ['url'=>'save_expense_report']) !!}
                        {!! Form::hidden('expense_report_id', $expenseReport->id) !!}
                @else
                    {!! Form::open(['url'=>'save_expense_report']) !!}
                @endif
                    <table>
                            <div class="form-group">
                                {{ Form::numberInput('amount', null, ['step' => '0.01'])}}
                            </div>    
                    <div class="form-group">
                        <label for="provider">Etablissement</label>
                        <input type="text" name="provider" value="" class="form-control">
                    </div>
                    <div class="form-group">
                         <label for="date_expense">Date</label>
                        <input type="date" name="date_expense" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        {{ Form::textAreaInput('details', null, ['placeholder' => 'Indiquez la nature de la dépense, les personne concernées, ou tout détail concernant la note de frais'])}}
                    </div>
                        <tr>
                            <td>{!! Form::label('document', 'Justificatif') !!}</td>
                            <td>
                                @if(isset($expenseReport->id) && $fileExists)
                                    <a target="_blank" href="{{ url($pathToFile) }}">
                                    {{ basename($pathToFile) }}<!-- img style="width:50%" class="img" src="{{ url($pathToFile) }}"-->
                                    </a>
                                    {!! Form::file('document') !!}
                                    
                                @else
                                {!! Form::file('document') !!}
                                @endif
                            </td>
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