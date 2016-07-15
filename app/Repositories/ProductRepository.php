<?php

namespace App\Repositories;

use App\Project;
use App\Product;

class ProductRepository
{

    public function forProject(Project $project)
    {
        return Product::where('project_id', $project->id)->get();
    }

    public function forId($id)
    {
        return Product::where('id', $id)->first();
    }

}