@extends('layout')

@section('content')
name: {{$user->name}}

<a href="{{route('user_posts' , ['user_id' => $user->id])}}">View User's Posts</a>
<a href="{{route('user_followers' , ['user_id' => $user->id])}}">View User's Followers</a>
@endsection