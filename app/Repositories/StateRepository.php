<?php

namespace App\Repositories;

use App\State;

class StateRepository
{

    public function all(){
        return State::lists('name', 'id');
    }

    public function getAll(){
    	return State::all();
    }

    public function forId($id){
    	return State::find($id);
    }
}