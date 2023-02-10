<?php
namespace App\Repositories;
use Illuminate\Support\Collection;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepository;

class EloquentPostRepository implements PostRepository {

    public function all()
    {
        return Post::all();
    }
    public function add($post) {
        return Post::create($post);
    }
  
    public function update($postId, $post) {
        $post = Post::find($postId);
        $post->update($post);
        return $post;
    }

    public function delete($postId) {
        $post = Post::find($postId);
        $post->delete();
        return $post;
    }

    public function get($postId) {
        return Post::find($postId);
    }

}