<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $connection_type = [
        'friend' => 0,
        'follower' => 1,
    ];

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_connections', 'user_id', 'target_user_id')
        ->where('type', User::$connection_type['follower']);
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_connections', 'target_user_id', 'user_id')
        ->where('type', User::$connection_type['follower']);
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany(User::class, 'user_connections', 'user_id', 'target_user_id')
        ->where('type', User::$connection_type['friend']);
    }

    public function friendsOf()
    {
        return $this->belongsToMany(User::class, 'user_connections', 'target_user_id', 'user_id')
        ->where('type', User::$connection_type['friend']);
    }

    public function getFriendsAttribute()
    {
        $friendsOf = $this->friendsOf;
        $friendsOfMine = $this->friendsOfMine;
        return $friendsOf->merge($friendsOfMine);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
