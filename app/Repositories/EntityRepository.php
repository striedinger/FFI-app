<?php

namespace App\Repositories;

use App\Company;
use App\Entity;

class EntityRepository
{

    public function forCompany(Company $company)
    {
        return Entity::where('company_id', $company->id)->get();
    }

    public function allForCompany(Company $company){
    	return Entity::where('company_id', $company->id)->lists('name', 'id');
    }

    public function forId($id)
    {
        return Entity::where('id', $id)->first();
    }

}