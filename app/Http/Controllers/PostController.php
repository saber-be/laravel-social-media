<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Config;
use App\SocialNetwork;
class PostController extends Controller
{
    private $network;
    public function __construct()
    {
        // dependency injection and inversion
        $this->network = new SocialNetwork(getRepository("post"), getResponder("post"));
    }
    public function all(Request $request)
    {
        return $this->network->all();
    }

    public function get(Request $request, $post_id)
    {
        return $this->network->view($post_id);
    }

    public function add(Request $request)
    {
        return view('posts.add');
    }

    public function save(Request $request){
        return $this->network->add($request->all());
    }

}
