@extends('layouts.app')

@section('content')
<div class="container has-text-centered">
    <figure class="imageis-128x128 avatar-profile">
        <img src="{{ $user->getFirstMedia('user')->getUrl() }}">
    </figure>
    <h1 class="title">{{ $user->username }}</h1>
    <h2 class="title">{{ $user->firstame.' '.$user->lastname }}</h2>
    @if($self)
    <a class="button" href="{{ route('profile-edit') }}">Edit profile</a>
    @endif
</div>
@endsection