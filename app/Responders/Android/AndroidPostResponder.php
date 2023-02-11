<?php
namespace App\Repositories\Android;
use Illuminate\Support\Collection;

use App\Models\User;
use App\Models\UserConnection;
use App\Repositories\Interfaces\PostRepository;
use App\Responders\Responder;
class AndroidPostResponder implements Responder
{

    public function all($posts)
    {
        return response()->json($posts);
    }

    public function addedSuccessfully()
    {
        return response()->json(["message" => "Android: Post added successfully"]);
    }

    public function updatedSuccessfully()
    {
        return response()->json(["message" => "Android: Post updated successfully"]);
    }

    public function deletedSuccessfully()
    {
        return response()->json(["message" => "Android: Post deleted successfully"]);
    }

    public function get($post)
    {
        return response()->json($post);
    }

}