<?php

namespace App\Repositories;

use App\User;
use App\Imi;

class ImiRepository
{

	public function all(){
		return Imi::paginate(100);
	}

    public function forCompany($id)
    {
        return Imi::where('company_id', $id)->first();
    }

    public function forId($id)
    {
        return Imi::where('id', $id)->first();
    }
}