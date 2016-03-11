<?php

namespace App\Repositories;

use App\User;
use App\Acap;

class AcapRepository
{

	public function all(){
		return Acap::paginate(100);
	}

    public function forCompany($id)
    {
        return Acap::where('company_id', $id)->first();
    }

    public function forId($id)
    {
        return Acap::where('id', $id)->first();
    }
}