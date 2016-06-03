<?php

namespace App\Repositories;

use App\User;
use App\Consultation;

class ConsultationRepository
{

	public function all($state){
		return Consultation::where(['active' => true, 'state_id' => $state->id])->orderBy('end_date', 'desc')->paginate(100);
	}

	public function allAdmin(){
		return Consultation::orderBy('end_date', 'desc')->paginate(100);
	}

    public function forId($id)
    {
        return Consultation::where('id', $id)->first();
    }
}