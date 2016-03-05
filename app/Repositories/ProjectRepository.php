<?php

namespace App\Repositories;

use App\User;
use App\Project;

class ProjectRepository
{

	public function all(){
		return Project::paginate(100);
	}

    public function forUser(User $user)
    {
        return Project::where('user_id', $user->id)->paginate(100);
    }

    public function forId($id)
    {
        return Project::where('id', $id)->first();
    }
}