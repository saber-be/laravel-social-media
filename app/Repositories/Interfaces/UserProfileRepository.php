<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserProfileRepository
{
    public function friends(User $user): Collection;
    public function followers(User $user): Collection;
    public function followings(User $user): Collection;
    public function posts(User $user): Collection;
}