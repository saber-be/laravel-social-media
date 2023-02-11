<?php
namespace App\Responders\Web;
use Illuminate\Support\Collection;
use App\Models\Post;
use App\Responders\Responder;
class WebPostResponder implements Responder
{

    public function all($posts)
    {
        return view('posts.all', compact('posts'));
    }

    public function addedSuccessfully()
    {
        return redirect()->route('posts')->with('success', 'Post added successfully');
    }

    public function updatedSuccessfully()
    {
        return redirect()->route('posts')->with('success', 'Post updated successfully');
    }

    public function deletedSuccessfully()
    {
        return redirect()->route('posts')->with('success', 'Post deleted successfully');
    }

    public function get($post)
    {
        return view('posts.post', compact('post'));
    }

}