<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Line extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'center_id'];	


    public function center(){
    	return $this->belongsTo(Center::class);
    }

}
