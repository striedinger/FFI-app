<?php

namespace App\Policies;

use App\User;

use App\Canvas;

use App\Project;

use Illuminate\Auth\Access\HandlesAuthorization;

class CanvasPolicy
{
    use HandlesAuthorization;

    public function update($user, $canvas){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $canvas->company->user_id;
        }
     }

     public function view($user, $canvas){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $canvas->company->user_id;
        }
     }
}
