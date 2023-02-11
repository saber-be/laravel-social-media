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
        <div class="form-group">
            <label for="title">User ID:</label>
            <input type="text" class="form-control" name="user_id" placeholder="user id" @isset($post) value="{{$post->user_id}}"@endisset >
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" placeholder="content">@isset($post){{$post->content}}@endisset</textarea>
        </div>

        <button class="btn btn-primary" type="submit">submit</button>
    </form>
@endsection