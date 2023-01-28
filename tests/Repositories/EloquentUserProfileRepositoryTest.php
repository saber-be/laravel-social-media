<?php

namespace Tests\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserConnection;
use App\Repositories\EloquentUserProfileRepository;
class EloquentUserProfileRepositoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_friends_method()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();
        $eloquentRepository = new EloquentUserProfileRepository();
        $friends_A = $eloquentRepository->friends($user_A);
        $friends_B = $eloquentRepository->friends($user_B);
        $this->assertEquals(0,count($friends_A));
        $this->assertEquals(0,count($friends_B));

        $user_A->friendsOfMine()->attach($user_B,['type' => UserConnection::TYPE_FRIEND,"created_at" => now(),"updated_at" => now()]);
        $user_A->refresh();
        $user_B->refresh();
        $friends_A = $eloquentRepository->friends($user_A);
        $friends_B = $eloquentRepository->friends($user_B);
        $this->assertEquals(1,count($friends_A));
        $this->assertEquals(1,count($friends_B));

    }

    public function test_followers_method()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();
        $eloquentRepository = new EloquentUserProfileRepository();
        
        $followers_A = $eloquentRepository->followers($user_A);
        $followers_B = $eloquentRepository->followers($user_A);
        $this->assertEquals(0,count($followers_A));
        $this->assertEquals(0,count($followers_B));

        $user_A->followers()->attach($user_B,['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
        $user_A->refresh();
        $user_B->refresh();
        
        $followers_A = $eloquentRepository->followers($user_A);
        $followers_B = $eloquentRepository->followers($user_B);
        $this->assertEquals(1,count($followers_A));
        $this->assertEquals(0,count($followers_B));

    }

    public function test_followings_method()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();
        $eloquentRepository = new EloquentUserProfileRepository();
        
        $followings_A = $eloquentRepository->followings($user_A);
        $followings_B = $eloquentRepository->followings($user_B);
        $this->assertEquals(0,count($followings_A));
        $this->assertEquals(0,count($followings_B));

        $user_A->followings()->attach($user_B,['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
        $user_A->refresh();
        $user_B->refresh();
        
        $followings_A = $eloquentRepository->followings($user_A);
        $followings_B = $eloquentRepository->followings($user_B);
        $this->assertEquals(1,count($followings_A));
        $this->assertEquals(0,count($followings_B));

    }

    public function test_posts_method(){
        $user_A = User::factory()->create();
        $eloquentRepository = new EloquentUserProfileRepository();
        $posts_A = $eloquentRepository->posts($user_A);

        $this->assertEquals(0,count($posts_A));

        $post_A = $user_A->posts()->create(['content' => 'test post']);
        $user_A->refresh();

        $posts_A = $eloquentRepository->posts($user_A);
        $this->assertEquals(1,count($posts_A));
        
    }

    
}
