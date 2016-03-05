<?php

namespace App\Repositories;

use App\Term;

class TermRepository
{
    public function all(){
        return Term::where(['active' => true])->lists('name', 'id');
    }

}