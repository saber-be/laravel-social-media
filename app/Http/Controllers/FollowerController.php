<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Config;
use App\SocialNetwork;
class FollowerController extends Controller
{
    private $network;
    public function __construct()
    {
        // dependency injection and inversion
        $this->network = new SocialNetwork(getRepository("follower"), getResponder("follower"));
    }
    public function all(Request $request)
    {
        return $this->network->all();
    }

    public function get(Request $request, $follower_id)
    {
        return $this->network->view($follower_id);
    }

    public function save(Request $request){
        return $this->network->add($request->all());
    }

    public function delete($follower_id)
    {
        return $this->network->delete($follower_id);
    }
}
