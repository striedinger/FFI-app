<?php

namespace App\Repositories;

use App\User;
use App\Canvas;

class CanvasRepository
{

	public function all(){
		return Canvas::paginate(100);
	}

    public function forProject($id)
    {
        return Canvas::where('project_id', $id)->first();
    }

    public function forId($id)
    {
        return Canvas::where('id', $id)->first();
    }
}