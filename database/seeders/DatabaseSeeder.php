<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserConnection;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ask user to input number of users
        $num_users = $this->command->ask('How many users do you want to create?', 10);
        
        print("Creating $num_users users\n");
        
        for ($i = 0; $i < $num_users; $i++) {
            try{
                $users[] = User::factory()->hasPosts(rand(0, 10))->create();
            }
            catch (\Illuminate\Database\QueryException $e) {
                // check if the error code is for duplicate entry
                if ($e->errorInfo[1] == 1062) {
                    // just ignore it
                    print("The generated email is duplicate, skipping it.\n");
                }else{
                    throw $e;
                }
            }
            
        }
        print("Creating connections\n");
        $users = User::orderBy('id','desc')->take($num_users)->get();
        foreach ($users as $user) {
            $user->followings()->attach($users->random(rand(2, 10)),['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
            $user->followers()->attach($users->random(rand(2, 10)),['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
            $user->friendsOfMine()->attach($users->random(rand(2, 10)),['type' => UserConnection::TYPE_FRIEND,"created_at" => now(),"updated_at" => now()]);
            $user->friendsOf()->attach($users->random(rand(2, 10)),['type' => UserConnection::TYPE_FRIEND,"created_at" => now(),"updated_at" => now()]);
        }

    }
}
