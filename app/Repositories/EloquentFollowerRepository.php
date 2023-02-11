<?php
namespace App\Repositories;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\UserConnection;
use App\Repositories\Interfaces\FollowerRepository;

class EloquentFollowerRepository implements FollowerRepository {

    public function all()
    {
        if($user_id = Request()->user_id){
            return User::findOrFail($user_id)->followers()->paginate(10);    
        }
        return User::orderBy("created_at","desc")->paginate(10);
    }

    public function add($follower_id) {
        // in fact it should be Auth user id
        $user = User::find(Request()->user_id);
        $user->followers()->attach(User::find($follower_id),['type' => UserConnection::TYPE_FOLLOWER,"created_at" => now(),"updated_at" => now()]);
        return TRUE;
    }
  
    public function update($entity_Id, $data) {}

    public function delete($follower_id) {
        // in fact it should be Auth user id
        $user = User::find(Request()->user_id);
        UserConnection::where([
            "user_id" => $user->id,
            "target_user_id" => $follower_id,
            "type" =>  UserConnection::TYPE_FOLLOWER
        ])->delete();
        return True;
    }

    public function get($follower_id) {
        return User::find($follower_id);
    }

}