<?php

namespace App\Repositories;

use App\User;
use App\Company;

class CompanyRepository
{

    public function all(){
        return Company::paginate(100);
    }

    public function forId($id){
        return Company::where(['id' => $id])->first();
    }

    public function forUser(User $user)
    {
        return Company::where('user_id', $user->id)->paginate(100);
    }

    public function listForUser(User $user){
        return Company::where(['user_id' => $user->id, 'active' => true])->lists('name', 'id');
    }
}