<?php

namespace App\Repositories;

use App\Project;
use App\Cost;

class CostRepository
{

    public function forProject(Project $project)
    {
        return Cost::where('project_id', $project->id)->groupBy('cost_category_id','entity_id')->get();
    }

    public function existsForEntityAndCategory(Project $project, $categoryId, $entityId){
    	if(count(Cost::where(['project_id' => $project->id, 'entity_id' => $entityId, 'cost_category_id' => $categoryId])->get())>0){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function forId($id)
    {
        return Cost::where('id', $id)->first();
    }

}