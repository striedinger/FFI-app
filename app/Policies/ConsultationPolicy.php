<?php

namespace App\Policies;

use App\User;
 
use App\Consultation;

use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPolicy
{
    use HandlesAuthorization;

    public function update($user, $consultation){
    	return $user->isAdmin();
    }

}
