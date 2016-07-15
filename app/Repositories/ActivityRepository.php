<?php

namespace App\Repositories;

use App\Activity;
use App\Product;

class ActivityRepository
{

    public function forProduct(Product $product)
    {
        return Activity::where('product_id', $product->id)->get();
    }

    public function forProject($id){
    	return Activity::whereHas('product', function($q) use ($id){
    		$q->where('project_id', $id);
    	})->get();
    }

    public function forId($id)
    {
        return Activity::where('id', $id)->first();
    }

}