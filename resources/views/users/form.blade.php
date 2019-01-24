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
                            {{ Form::simpleInput('name',null,['placeholder'=>'toto']) }}
                            <div class="form-group">
                                {{ Form::simpleInput('email', null, ['placeholder' => 'exemple@test.essaie'])}}
                            </div>    
                    </div>
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