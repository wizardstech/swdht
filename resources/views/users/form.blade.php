@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Modification de l'utilisateur {{ $users->name }}
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

                @if (isset($users))
                    {!! Form::model($users, ['url'=>'save_users']) !!}
                        {!! Form::hidden('users_id', $users->id) !!}
                @else
                    {!! Form::open(['url'=>'save_users']) !!}
                @endif
                    <table>
                    <div class="form-group">
                            {{ Form::simpleInput('first_name',null,['placeholder'=>'toto']) }}
                            <div class="form-group">
                                {{ Form::numberInput('amount', null, ['step' => '0.01'])}}
                            </div>    
                    </div>
                        <tr>
                            <td>{!! Form::label('provider', 'Etablissement') !!}</td>
                            <td>{!! Form::text('provider') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! Form::label('date_expense', 'Date') !!}</td>
                            <td class="form-control">{!! Form::date('date_expense') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! Form::label('details', 'Description') !!}</td>
                            <td >{!! Form::textarea('details', null,['placeholder' => 'Indiquez la nature de la dépense, les personne concernées, ou tout détail concernant la note de frais']) !!}</td>
                        </tr>
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