<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Repositories\CachingUserProfileRepository;
use App\Repositories\EloquentUserProfileRepository;

class UserProfileController extends Controller
{
    
    public function show(Request $request, User $user)
    {
        $user_profile = new EloquentUserProfileRepository();

        // comment the following line to disable caching
        $user_profile = new CachingUserProfileRepository($user_profile);


        $friends = $user_profile->friends($user);
        $followers = $user_profile->followers($user);
        $followings = $user_profile->followings($user);
        $posts = $user_profile->posts($user);

        return response()->json([
            'user' => $user,
            'posts' => $posts,
            'friends' => $friends,
            'followers' => $followers,
            'followings' => $followings,
        ]);
        
    }
}
