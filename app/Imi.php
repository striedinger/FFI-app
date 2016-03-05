<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imi extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function company(){
    	return $this->belongsTo(Company::class);
    }
}
