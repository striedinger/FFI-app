<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'description', 'state', 'project_id'];

    public function project(){
    	return $this->belongsTo(Project::class);
    }

    public function activities(){
    	return $this->hasMany(Activity::class);
    }

    protected static function boot(){
    	parent::boot();

    	static::deleting(function($product){
    		$product->activities()->delete();
    	});
    }
}
