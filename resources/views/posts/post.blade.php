@extends('layout')

@section('content')
<div class="post">
        <h2>{{ $post->user->name }}</h2>
        <h3>{{ $post->content }}</h3>
        <h4>{{ $post->created_at }}</h4>
        <a href="{{ route('edit_post', ['post_id' => $post->id]) }}">Edit</a>
        <form action="{{ route('delete_post', ['post_id' => $post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
</div>
@endsection