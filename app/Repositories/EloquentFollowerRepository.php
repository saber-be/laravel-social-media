<?php
namespace App\Repositories;
use Illuminate\Support\Collection;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepository;

class EloquentFollowerRepository implements PostRepository {

    public function all()
    {
        // retun post with pagination
        return Post::orderBy("created_at","desc")->paginate(10);
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