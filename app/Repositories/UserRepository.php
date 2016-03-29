<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    public function all(){
        return User::paginate(100);
    }

    public function countAll(){
    	return User::where(['role_id' => 5])->count();
    }

    public function forId($id){
        return User::where(['id' => $id])->first();
    }
}