<?php

namespace App\Policies;

use App\User;

use App\Acap;

use App\Company;

use Illuminate\Auth\Access\HandlesAuthorization;

class AcapPolicy
{
    use HandlesAuthorization;

    public function update($user, $acap){
        if($user->isSuperAdmin()){
            return true;
        }else{
            return $user->id == $acap->company->user_id;
        }
     }

     public function view($user, $acap){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $acap->company->user_id;
        }
     }
}
