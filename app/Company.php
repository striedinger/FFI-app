<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Nicolaslopezj\Searchable\SearchableTrait;

class Company extends Model
{
	use SoftDeletes;

    use SearchableTrait;

	protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'nit', 'description', 'state_id', 'city', 'address', 'active', 'priority'];

    protected $searchable = [
        'columns' => [
            'companies.name' => 10,
            'companies.description' => 10,
            'companies.city' => 10,
            'companies.address' => 10,
            'companies.nit' => 10,
        ],
        'joins' => [
            'projects' => ['companies.id', 'projects.company_id'],
        ]
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function projects(){
    	return $this->hasMany(Project::class);
    }

    public function state(){
    	return $this->belongsTo(State::class);
    }

    public function canvas(){
        return $this->hasMany(Canvas::class);
    }

    public function imi(){
        return $this->hasMany(Imi::class);
    }

    public function acap(){
        return $this->hasMany(Acap::class);
    }

    public function icai(){
        return $this->hasMany(Icai::class);
    }

    public function entities(){
        return $this->hasMany(Entity::class);
    }
}
