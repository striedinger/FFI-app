<?php

namespace App\Policies;

use App\User;

use App\Company;

use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Company $company){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $company->user_id;
        }
     }

     public function create_entity(User $user, Company $company){
        return $user->id == $company->user->id;
    }

     public function search(User $user){
        return $user->isAdmin();
     }

     public function view(User $user, Company $company){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $company->user_id;
        }
     }
}
