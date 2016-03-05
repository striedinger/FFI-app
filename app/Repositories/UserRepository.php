<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    public function all(){
        return User::paginate(100);
    }

    public function forId($id){
        return User::where(['id' => $id])->first();
    }
}