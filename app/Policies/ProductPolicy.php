<?php

namespace App\Policies;

use App\User;

use App\Product;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Product $product){
        return $user->id == $product->project->user_id || $user->isSuperAdmin();
    }

    public function update(User $user, Product $product){
        if($user->isAdmin()){
            return true;
        }else{
            return $user->id == $product->project->user_id;
        }
    }
}
