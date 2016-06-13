<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['user_id', 'state_id', 'start_date', 'end_date', 'duration', 'location', 'description', 'active'];

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function state(){
		return $this->belongsTo(State::class);
	}

	public function availableTimes(){
		return $this->hasMany(ConsultationTime::class)->where(['available' => true])->orderBy('time', 'asc');
	}

	public function times(){
		return $this->hasMany(ConsultationTime::class)->orderBy('time', 'asc');
	}
}
