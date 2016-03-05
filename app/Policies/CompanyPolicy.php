<?php

namespace App\Policies;

use App\User;

use App\Company;

use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Company $company){
        if($user->isSuperAdmin()){
            return true;
        }else{
            return $user->id == $company->user_id;
        }
     }

     public function view(User $user, Company $company){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $company->user_id;
        }
     }
}
