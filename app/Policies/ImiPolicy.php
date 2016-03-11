<?php

namespace App\Policies;

use App\User;

use App\Imi;

use App\Company;

use Illuminate\Auth\Access\HandlesAuthorization;

class ImiPolicy
{
    use HandlesAuthorization;

    public function update($user, $imi){
        if($user->isSuperAdmin()){
            return true;
        }else{
            return $user->id == $imi->company->user_id;
        }
     }

     public function view($user, $imi){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $imi->company->user_id;
        }
     }
}
