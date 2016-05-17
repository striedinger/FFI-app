<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    public function all(){
        return User::paginate(100);
    }

    public function assistants(){
    	return User::where(['role_id' => 2, 'active' => true])->lists('name', 'id');
    }

    public function countAll(){
    	return User::where(['role_id' => 5, 'active' => true])->count();
    }

    public function forId($id){
        return User::where(['id' => $id])->first();
    }

    public function searchByQuery($query){
        return User::search($query)->take(50)->get();
    }
}