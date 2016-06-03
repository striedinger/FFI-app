<?php

namespace App\Repositories;

use App\User;
use App\Appointment;

class AppointmentRepository
{

	public function all($user){
		return Appointment::where(['user_id' => $user->id])->orderBy('date', 'desc')->paginate(100);
	}

	public function allMine($user){
		return Appointment::where(['assistant_id' => $user->id])->orderBy('date', 'desc')->paginate(100);
	}

	public function allAdmin(){
		return Appointment::orderBy('date', 'desc')->paginate(100);
	}

	public function forConsultation($consultation){
		return Appointment::whereHas('consultationTime', function($q) use($consultation){
            $q->where(['consultation_id' => $consultation->id, 'active' => true]);
        })->get();
	}

    public function forId($id)
    {
        return Appointment::where('id', $id)->first();
    }
}