<?php

namespace Tests\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserConnection;
use App\Repositories\EloquentUserProfileRepository;
class UserProfileControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_user_profile_show_route_returns_a_successful_response()
    {
        $user = User::factory()->create();
        $response = $this->get(route("profile",[$user]));
        $response->assertStatus(200);
    }

    public function test_the_user_profile_show_route_return_posts()
    {
        $user = User::factory()->hasPosts(3)->create();
        
        $response = $this->get(route("profile",[$user]));

        $response->assertJsonCount(3,"user.posts");
    }

    public function test_the_user_profile_show_route_return_friends()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();
        
        $user_A->friendsOfMine()->attach($user_B,['type' => UserConnection::TYPE_FRIEND,"created_at" => now(),"updated_at" => now()]);
        
        $response_A = $this->get(route("profile",[$user_A]));
        $response_B = $this->get(route("profile",[$user_B]));
        
        $response_A->assertJsonCount(1,"user.friends");
        $response_B->assertJsonCount(1,"user.friends");

        // user B is in user.friends of response_A
        $response_A->assertJsonFragment(["id" => $user_B->id]);
        // user A is in user.friends of response_B
        $response_B->assertJsonFragment(["id" => $user_A->id]);
    }

    public function test_the_user_profile_show_route_cache_friends()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();
        
        $response_A = $this->get(route("profile",[$user_A]));
        $response_B = $this->get(route("profile",[$user_B]));
        
        $user_A->friendsOfMine()->attach($user_B,['type' => UserConnection::TYPE_FRIEND,"created_at" => now(),"updated_at" => now()]);
        
        $response_A->assertJsonCount(0,"user.friends");
        $response_B->assertJsonCount(0,"user.friends");

    }

    public function test_the_user_profile_show_route_return_followers()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();        
        $user_A->followers()->attach($user_B,['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
        
        
        $response_A = $this->get(route("profile",[$user_A]));
        $response_B = $this->get(route("profile",[$user_B]));

        $response_A->assertJsonCount(1,"user.followers");
        $response_B->assertJsonCount(0,"user.followers");
    }

    public function test_the_user_profile_show_route_cache_followers()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();        
        
        
        $response_A = $this->get(route("profile",[$user_A]));

        $user_A->followers()->attach($user_B,['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);

        $response_A->assertJsonCount(0,"user.followers");
    }

    public function test_the_user_profile_show_route_return_followings()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();
        
        $user_A->followings()->attach($user_B,['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
        
        $response_A = $this->get(route("profile",[$user_A]));
        $response_B = $this->get(route("profile",[$user_B]));

        $response_A->assertJsonCount(1,"user.followings");
        $response_B->assertJsonCount(0,"user.followings");
    }

    public function test_the_user_profile_show_route_cache_followings()
    {
        $user_A = User::factory()->create();
        $user_B = User::factory()->create();
        
        $response_A = $this->get(route("profile",[$user_A]));
        
        $user_A->followings()->attach($user_B,['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);

        $response_A->assertJsonCount(0,"user.followings");
    }



}
