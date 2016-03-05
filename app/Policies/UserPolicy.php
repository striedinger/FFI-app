<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user){
    	if($user->isAdmin()){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function update(User $user1, User $user2){
        if($user1->isAdmin()){
            return true;
        }else{
            return $user1->id == $user2->id;
        }
     }

     public function view(User $user1, User $user2){
        if($user1->isAdmin()){
            return true;
        }else{
            return $user1->id == $user2->id;
        }
     }
}
