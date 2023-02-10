<?php
namespace App\Responders\Web;
use Illuminate\Support\Collection;
use App\Models\Post;

class WebPostResponder
{

    public function all($posts)
    {
        return view('posts.all', compact('posts'));
    }

    public function addedSuccessfully()
    {
        return redirect()->route('posts')->with('success', 'Post added successfully');
    }

    public function get($post)
    {
        return view('posts.post', compact('post'));
    }

}