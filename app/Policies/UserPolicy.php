<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user){
    	return $user->isAdmin();
    }

    public function update(User $user1, User $user2){
        if($user1->isSuperAdmin()){
            return true;
        }else{
            return $user1->id == $user2->id;
        }
     }

     public function search(User $user){
        return $user->isAdmin();
     }

     public function view(User $user1, User $user2){
        if($user1->isAdmin()){
            return true;
        }else{
            return $user1->id == $user2->id;
        }
     }
}
