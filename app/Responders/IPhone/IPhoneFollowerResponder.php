<?php
namespace App\Responders\IPhone;
use Illuminate\Support\Collection;
use App\Responders\Responder;
class IPhoneFollowerResponder implements Responder
{

    public function all($followers)
    {
        return response()->json(["iphone"=>"followers","followers"=>$followers]);
    }

    public function addedSuccessfully()
    {
        return response()->json(["message" => "IPhone: Follower added successfully"]);
    }

    public function updatedSuccessfully()
    {
        return response()->json(["message" => "IPhone: Follower updated successfully"]);
    }

    public function deletedSuccessfully()
    {
        return response()->json(["message" => "IPhone: Follower deleted successfully"]);
    }

    public function get($follower)
    {
        return response()->json($follower);
    }

}