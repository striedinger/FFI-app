<?php

namespace App\Repositories;

use App\State;

class StateRepository
{

    public function all(){
        return State::lists('name', 'id');
    }

}