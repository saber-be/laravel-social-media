@extends('layout')

@section('content')
<h1>Posts:</h1>
<div class="row">
@forelse($posts as $post)

    <div class="col-md-4 mt-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->user->name }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('edit_post', ['post_id' => $post->id]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('edit_post', ['post_id' => $post->id]) }}" class="btn btn-primary">View</a>
                <form action="{{ route('delete_post', ['post_id' => $post->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
                

            </div>
        </div>
    </div>
    @empty
    <p>No posts found</p>
    @endforelse
</div>
<div class="row">
    <div class="col-12">
       
    </div>
</div>
@endsection