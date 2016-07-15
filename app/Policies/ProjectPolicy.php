<?php

namespace App\Policies;

use App\User;

use App\Project;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function create_product(User $user, Project $project){
        return $user->id == $project->user_id;
    }

    public function create_activity(User $user, Project $project){
        return $user->id == $project->user_id;
    }

    public function create_entity(User $user, Project $project){
        return $user->id == $project->company->user->id;
    }

    public function create_cost(User $user, Project $project){
        return $user->id == $project->user_id;
    }

    public function destroy(User $user, Project $project){
        return $user->id == $project->user_id;
    }

    public function update(User $user, Project $project){
        if($user->isAdmin()){
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
