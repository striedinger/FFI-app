<?php

namespace App\Policies;

use App\User;

use App\Activity;

use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Activity $activity){
        return $user->id == $activity->product->project->user_id || $user->isSuperAdmin();
    }

    public function update(User $user, Activity $activity){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $activity->product->project->user_id;
        }
    }
}
