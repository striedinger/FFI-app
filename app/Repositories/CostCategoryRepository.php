<?php

namespace App\Repositories;

use App\CostCategory;

class CostCategoryRepository
{
    public function all(){
        return CostCategory::get();
    }

}