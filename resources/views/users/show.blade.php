@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Utilisateur n°{{$users->id}}
                </div>
                <div class="card-body">
                   <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Nom</th>
                          <th scope="col">Mail</th>
                          <th scope="col">Rôle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{ $users->name  }}</td>
                          <td>{{  $users->email  }}</td>
                          <td>{{  $users->role  }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            <a href='{{ route('modify_users', ['id' => $users->id]) }}'><button type="button" class="btn btn-secondary btn-lg btn-block">Edit</button></a>
            </div>
        </div>
    </div>
</div>
@endsection

