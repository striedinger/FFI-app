<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['name'];

    public function projects(){
        return $this->hasMany(Term::class);
    }
}
