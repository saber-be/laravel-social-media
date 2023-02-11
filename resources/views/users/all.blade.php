@extends('layout')

@section('content')
    @foreach($users as $user)
    {{$user->name}}
    @endforeach
    {{ $users->links()}}
@endsection