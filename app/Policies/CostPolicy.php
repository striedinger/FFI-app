<?php

namespace App\Policies;

use App\User;

use App\Cost;

use Illuminate\Auth\Access\HandlesAuthorization;

class CostPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Cost $cost){
        return $user->id == $cost->project->user_id || $user->isSuperAdmin();
    }

    public function update(User $user, Cost $cost){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $cost->project->user_id;
        }
    }
}
