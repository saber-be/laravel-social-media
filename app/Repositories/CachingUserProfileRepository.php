<?php
namespace App\Repositories;
use Illuminate\Support\Collection;

use App\Models\User;
use App\Models\UserConnection;
use App\Repositories\Interfaces\UserProfileRepository;

class CachingUserProfileRepository implements UserProfileRepository
{
    protected $UserProfile;

    public function __construct(UserProfileRepository $UserProfile)
    {
        $this->UserProfile = $UserProfile;
    }

    public function friends(User $user): Collection
    {
        return cache()->remember("user:{$user->id}:friends", 60 * 5, function () use ($user) {
            return $this->UserProfile->friends($user);
        });
    }

    public function followers(User $user): Collection
    {
        return cache()->remember("user:{$user->id}:followers", 60 * 5, function () use ($user) {
            return $this->UserProfile->followers($user);
        });
    }

    public function followings(User $user): Collection
    {
        return cache()->remember("user:{$user->id}:followings", 60 * 5, function () use ($user) {
            return $this->UserProfile->followings($user);
        });
    }

    public function posts(User $user): Collection
    {
        return cache()->remember("user:{$user->id}:posts", 60 * 5, function () use ($user) {
            return $this->UserProfile->posts($user);
        });
    }
}