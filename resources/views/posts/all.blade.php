@extends('layout')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<a href="{{ route('add_post') }}">Add Post</a>
<h1>Posts:</h1>
@forelse($posts as $post)
    <div class="post">
        <h2>{{ $post->user->name }}</h2>
        <h3>{{ $post->content }}</h3>
        <h4>{{ $post->created_at }}</h4>
        <a href="{{ route('post', ['post_id' => $post->id]) }}">View</a>
        <a href="{{ route('edit_post', ['post_id' => $post->id]) }}">Edit</a>
        <form action="{{ route('delete_post', ['post_id' => $post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

    </div>
@empty
    <p>No posts found</p>
@endforelse
{{ $posts->links() }}
@endsection