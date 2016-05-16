<?php

namespace App\Repositories;

use App\User;
use App\Consultation;

class ConsultationRepository
{

	public function all(){
		return Consultation::where(['active' => true])->paginate(100);
	}

	public function allAdmin(){
		return Consultation::paginate(100);
	}

    public function forId($id)
    {
        return Consultation::where('id', $id)->first();
    }
}