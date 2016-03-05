<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'nit', 'description', 'state_id', 'city', 'address', 'active'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function projects(){
    	return $this->hasMany(Project::class);
    }

    public function state(){
    	return $this->belongsTo(State::class);
    }

    public function imi(){
        return $this->hasMany(Imi::class);
    }
}
