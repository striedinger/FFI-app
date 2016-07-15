<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['product_id', 'name', 'description', 'responsible', 'start_date', 'end_date', 'activity_id'];

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public function parent(){
    	return $this->belongsTo(Activity::class);
    }
}
