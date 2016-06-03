<?php

namespace App\Policies;

use App\User;
 
use App\Appointment;

use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    public function view($user, $appointment){
    	if($user->isAdmin()){
            return true;
        }else{
        	return $user->id == $appointment->user_id;
        }
    }

    public function update($user, $appointment){
        if($user->isSuperAdmin()){
            return true;
        }else{
            return $appointment->assistant_id == $user->id;
        }
    }
}
