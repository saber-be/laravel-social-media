<?php
namespace App\Responders\Android;
use Illuminate\Support\Collection;

use App\Models\User;
use App\Models\UserConnection;
use App\Repositories\Interfaces\PostRepository;
use App\Responders\Responder;
class AndroidFollowerResponder implements Responder
{

    public function all($followers)
    {
        return response()->json(["Android"=>"followers","followers"=>$followers]);
    }

    public function addedSuccessfully()
    {
        return response()->json(["message" => "Android: Follower added successfully"]);
    }

    public function updatedSuccessfully()
    {
        return response()->json(["message" => "Android: Follower updated successfully"]);
    }

    public function deletedSuccessfully()
    {
        return response()->json(["message" => "Android: Follower deleted successfully"]);
    }

    public function get($follower)
    {
        return response()->json($follower);
    }

}