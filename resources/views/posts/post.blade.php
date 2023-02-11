@extends('layout')

@section('content')
<div class="post">
    <form action="{{ route('save_post') }}" method="POST">
        @csrf
        @if($post)
            <input type="hidden" name="id" value="{{ $post->id }}">
        @endif
        @isset($post) Author: {{$post->user->name}} @endisset
        <input type="text" name="user_id" placeholder="user id" value="{{$post->user_id}}" >
        <textarea name="content" placeholder="content">@isset($post){{$post->content}}@endisset</textarea>
        <button type="submit">save Post</button>
    </form>
@endsection