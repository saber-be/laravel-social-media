<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Config;
use App\Facads\PostResponderFacade;
use App\Facads\ResponseFacade;
use App\Repositories\CachingUserProfileRepository;
use App\Repositories\EloquentPostRepository;
use App\SocialNetwork;
class PostController extends Controller
{
    public function all(Request $request)
    {
        $repo = getRepository("post");
        $posts = $repo->all();
        return PostResponderFacade::all($posts);
    }

    public function get(Request $request, $post_id)
    {
        $repo = getRepository("post");
        $post = $repo->get($post_id);
        return PostResponderFacade::get($post);
    }

    public function add(Request $request)
    {
        return view('posts.add');
    }

    public function save(Request $request){
        $repo = getRepository("post");
        $repo->add($request->all());
        return PostResponderFacade::addedSuccessfully();
    }

}
