<?php
namespace App\Responders\Web;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Responders\Responder;
class WebFollowerResponder implements Responder
{

    public function all($followers)
    {
        return view('users.all', ["users" => $followers]);
    }

    public function addedSuccessfully()
    {
        return redirect()->back()->with('success', 'Follower added successfully');
    }

    public function updatedSuccessfully(){}

    public function deletedSuccessfully()
    {
        return redirect()->back()->with('success', 'Follower deleted successfully');
    }

    public function get($follower)
    {

        return view('users.profile', ['user' => $follower] );
    }

    public function edit($follower)
    {
        return view('users.profile', ['user' => $follower]);
    }

}