@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Ensembles des Utilisateurs
                </div>
                <div class="card-body">
                  <a href='/new_user' class="btn btn-outline-primary">Crée un nouvelle utilisateur</a>
                  <br><br>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Rôle</th>
                              <th scope="col">Employer depuis</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(Auth::user()->role == 'admin')
                                @foreach($users as $user)
                                    <tr>
                                      <td>{{ $user->name }}</td>
                                      <td>{{ $user->email }}</td> 
                                      <td>{{ $user->role }}</td>
                                      <td>{{ $user->created_at }}</td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <td><a href='{{ route('show_users', ['id' => $user->id]) }}' class="btn btn-outline-primary" >View</a></td>
                                            <td><a href='{{ route('modify_users', ['id' => $user->id]) }}' class="btn btn-outline-primary" >Edit</a></td>
                                            <td><a onclick="return confirm('Est-ce votre dernier mot?');" href='{{ route('delete_users', ['id' => $user->id]) }}' class="btn btn-outline-primary" >Delete</a></td> 
                                        </div>
                                    </tr>
                                @endforeach
                            @endif                            
                          </tbody>
                        </table>
                          {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

