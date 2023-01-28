<?php

namespace Tests\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserConnection;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_friends_attribute()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();

        $friends_A = $user_A->friends;
        $friends_B = $user_B->friends;
        $this->assertEquals(0,count($friends_A));
        $this->assertEquals(0,count($friends_B));

        $user_A->friendsOfMine()->attach($user_B,['type' => UserConnection::TYPE_FRIEND,"created_at" => now(),"updated_at" => now()]);
        $user_A->refresh();
        $user_B->refresh();
        $friends_A = $user_A->friends;
        $friends_B = $user_B->friends;
        $this->assertEquals(1,count($friends_A));
        $this->assertEquals(1,count($friends_B));

    }

    public function test_friendsOf_relation()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();

        $friends_A = $user_A->friends;
        $friends_B = $user_B->friends;
        $this->assertEquals(0,count($friends_A));
        $this->assertEquals(0,count($friends_B));

        $user_A->friendsOf()->attach($user_B,['type' => UserConnection::TYPE_FRIEND,"created_at" => now(),"updated_at" => now()]);
        $user_A->refresh();
        $user_B->refresh();

        $this->assertEquals(1,count($user_A->friendsOf));
        $this->assertEquals(0,count($user_A->friendsOfMine));
        $this->assertEquals(0,count($user_B->friendsOf));
        $this->assertEquals(1,count($user_B->friendsOfMine));
        

    }

    public function test_friendsOfMine_relation()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();

        $friends_A = $user_A->friends;
        $friends_B = $user_B->friends;
        $this->assertEquals(0,count($friends_A));
        $this->assertEquals(0,count($friends_B));

        $user_A->friendsOfMine()->attach($user_B,['type' => UserConnection::TYPE_FRIEND,"created_at" => now(),"updated_at" => now()]);
        $user_A->refresh();
        $user_B->refresh();

        $this->assertEquals(0,count($user_A->friendsOf));
        $this->assertEquals(1,count($user_A->friendsOfMine));
        $this->assertEquals(1,count($user_B->friendsOf));
        $this->assertEquals(0,count($user_B->friendsOfMine));
        
    }

    public function test_followers_relation()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();

        $followers_A = $user_A->followers;
        $followers_B = $user_B->followers;
        $this->assertEquals(0,count($followers_A));
        $this->assertEquals(0,count($followers_B));

        $user_A->followers()->attach($user_B,['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
        $user_A->refresh();
        $user_B->refresh();
        $followers_A = $user_A->followers;
        $followers_B = $user_B->followers;
        $this->assertEquals(1,count($followers_A));
        $this->assertEquals(0,count($followers_B));

    }

    public function test_followings_relation()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();

        $followings_A = $user_A->followings;
        $followings_B = $user_B->followings;
        $this->assertEquals(0,count($followings_A));
        $this->assertEquals(0,count($followings_B));

        $user_A->followings()->attach($user_B,['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
        $user_A->refresh();
        $user_B->refresh();
        $followings_A = $user_A->followings;
        $followings_B = $user_B->followings;
        $this->assertEquals(1,count($followings_A));
        $this->assertEquals(0,count($followings_B));

    }

    public function test_posts_relation(){
        $user_A = User::factory()->create();

        $posts_A = $user_A->posts;
        $this->assertEquals(0,count($posts_A));

        $post_A = $user_A->posts()->create(['content' => 'test post']);
        $user_A->refresh();
        $posts_A = $user_A->posts;
        $this->assertEquals(1,count($posts_A));
        
    }
}
