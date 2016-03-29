<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Center extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'state_id'];	


    public function state(){
    	return $this->belongsTo(State::class);
    }

    public function lines(){
    	return $this->hasMany(Line::class);
    }

}
