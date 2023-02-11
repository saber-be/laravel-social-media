<?php
namespace App\Responders\IPhone;
use Illuminate\Support\Collection;
use App\Models\Post;
use App\Responders\Responder;
class IPhonePostResponder implements Responder
{

    public function all($posts)
    {
        return response()->json(["iphone"=>"posts","posts"=>$posts]);
    }

    public function addedSuccessfully()
    {
        return response()->json(["message" => "IPhone: Post added successfully"]);
    }

    public function updatedSuccessfully()
    {
        return response()->json(["message" => "IPhone: Post updated successfully"]);
    }

    public function deletedSuccessfully()
    {
        return response()->json(["message" => "IPhone: Post deleted successfully"]);
    }

    public function get($post)
    {
        return response()->json($post);
    }

}