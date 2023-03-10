<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserConnection extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const TYPE_FRIEND = 0;
    public const TYPE_FOLLOWER = 1;
}
