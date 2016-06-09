<?php

namespace App\Repositories;

use App\User;
use App\Consultation;
use DateTime;

class ConsultationRepository
{

	public function all($state){
		$date = new DateTime();
        $date->setTime(0,0,0);
		return Consultation::where(['active' => true, 'state_id' => $state->id, ['end_date', '>=', $date]])->orderBy('end_date', 'desc')->paginate(100);
	}

	public function allAdmin(){
		return Consultation::orderBy('end_date', 'desc')->paginate(100);
	}

    public function forId($id)
    {
        return Consultation::where(['id' =>$id])->first();
    }

    public function forState($id){
        $date = new DateTime();
        $date->setTime(0,0,0);
    	return Consultation::where(['state_id' => $id, 'active' => true, ['end_date', '>=', $date]])->orderBy('end_date', 'desc')->get();
    }

    public function forAdminState($id){
        return Consultation::where(['state_id' => $id])->get();
    }

    public function forUser($id){
        return Consultation::where(['user_id' => $id])->get();
    }
}