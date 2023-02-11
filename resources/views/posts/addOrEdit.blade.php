@extends('layout')

@section('content')
<div class="post">
    @isset($post) Author: {{$post->user->name}} @endisset
    @isset($post)
    <form action="{{ route('update_post',['post_id' => $post->id]) }}" method="POST">
    @else    
    <form action="{{ route('save_post') }}" method="POST">
    @endisset
        @csrf
        @isset($post)
        <input type="hidden" name="id" value="{{ $post->id }}">
        @endisset
        <input type="text" name="user_id" placeholder="user id" @isset($post) value="{{$post->user_id}}"@endisset >
        <textarea name="content" placeholder="content">@isset($post){{$post->content}}@endisset</textarea>
        <button type="submit">submit</button>
    </form>
@endsection