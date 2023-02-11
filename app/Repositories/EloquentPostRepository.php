<?php
namespace App\Repositories;
use Illuminate\Support\Collection;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepository;

class EloquentPostRepository implements PostRepository {

    public function all()
    {
        // retun post with pagination
        return Post::orderBy("created_at","desc")->paginate(10);
    }
    public function add($post) {
        return Post::create($post);
    }
  
    public function update($postId, $data) {
        $post = Post::find($postId);
        $post->update($data);
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