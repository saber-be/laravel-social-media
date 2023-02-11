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
        /*
        mobile users do not need this page
        this is just for web users.
        */
        return view('posts.addOrEdit');
    }

    public function edit(Request $request, $post_id)
    {
        /*
        mobile users do not need this page
        this is just for web users.
        */
        return $this->network->edit($post_id);
    }

    public function save(Request $request){
        return $this->network->add($request->all());
    }

    public function update(Request $request, $post_id){
        return $this->network->update($post_id,$request->all());
    }
}
