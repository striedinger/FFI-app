<?php

namespace App\Policies;

use App\User;

use App\Project;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Project $project){
        return $user->id == $project->user_id;
    }

    public function update(User $user, Project $project){
        if($user->isSuperAdmin()){
            return true;
        }else{
            return $user->id == $project->user_id;
        }
    }

    public function search(User $user){
        return $user->isAdmin();
     }

    public function view(User $user, Project $project){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $project->user_id;
        }
    }
}
