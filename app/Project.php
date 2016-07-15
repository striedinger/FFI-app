<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Nicolaslopezj\Searchable\SearchableTrait;

class Project extends Model
{
	use SoftDeletes;

    use SearchableTrait;

	protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'description', 'amount', 'company_id', 'term_id', 'active'];	

    protected $searchable = [
        'columns' => [
            'projects.name' => 10,
            'projects.description' => 10,
        ],
    ];


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

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function costs(){
        return $this->hasMany(Cost::class);
    }

    protected static function boot(){
        parent::boot();

        static::deleting(function($project){
            $project->products()->delete();
            $project->comments()->delete();
            $project->costs()->delete();
        });
    }

}
