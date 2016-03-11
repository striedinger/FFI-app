<?php

namespace App\Repositories;

use App\User;
use App\Icai;

class IcaiRepository
{

	public function all(){
		return Icai::paginate(100);
	}

    public function forCompany($id)
    {
        return Icai::where('company_id', $id)->first();
    }

    public function forId($id)
    {
        return Icai::where('id', $id)->first();
    }
}