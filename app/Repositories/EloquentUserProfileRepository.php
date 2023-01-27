<?php
namespace App\Repositories;
use Illuminate\Support\Collection;

use App\Models\User;
use App\Models\UserConnection;
use App\Repositories\Interfaces\UserProfileRepository;

class EloquentUserProfileRepository implements UserProfileRepository
{
    public function friends(User $user): Collection
    {
        return $user->friends;
    }

    public function followers(User $user): Collection
    {
        return $user->followers;
    }

    public function followings(User $user): Collection
    {
        return $user->followings;
    }

    public function posts(User $user): Collection
    {
        return $user->posts;
    }
}