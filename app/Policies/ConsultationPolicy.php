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

    public function view($user, $consultation){
    	if($user->isAdmin()){
    		return true;
    	}else{
    		return $user->state_id == $consultation->state_id && $consultation->active;
    	}
    }

}
