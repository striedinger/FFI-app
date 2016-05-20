<?php

namespace App\Policies;

use App\User;

use App\Icai;

use App\Company;

use Illuminate\Auth\Access\HandlesAuthorization;

class IcaiPolicy
{
    use HandlesAuthorization;

    public function update($user, $icai){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $icai->company->user_id;
        }
     }

     public function view($user, $icai){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $icai->company->user_id;
        }
     }
}
