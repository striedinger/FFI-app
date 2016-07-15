<?php

namespace App\Policies;

use App\User;

use App\Entity;

use Illuminate\Auth\Access\HandlesAuthorization;

class EntityPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Entity $entity){
        return $user->id == $entity->company->user_id || $user->isSuperAdmin();
    }

    public function update(User $user, Entity $entity){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $entity->company->user_id;
        }
    }
}
