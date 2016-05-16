<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'description', 'amount', 'company_id', 'term_id', 'active'];	


    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function term(){
    	return $this->belongsTo(Term::class);
    }

    public function comments(){
        return $this->hasMany(ProjectComment::class)->orderBy('created_at', 'desc');
    }

}
