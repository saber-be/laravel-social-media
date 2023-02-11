@extends('layout')

@section('content')
<h1>Posts:</h1>
@forelse($posts as $post)
    <div class="post">
        <h2>{{ $post->user->name }}</h2>
        <h3>{{ $post->content }}</h3>
        <h4>{{ $post->created_at }}</h4>
        <a href="{{ route('edit_post', ['post_id' => $post->id]) }}">Edit</a>
    </div>
@empty
    <p>No posts found</p>
@endforelse
{{ $posts->links() }}
@endsection