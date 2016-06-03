<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = ['date', 'user_id', 'assistant_id', 'consultation_time_id', 'user_comment', 'assistant_comment', 'status', 'active', 'company_id'];

	public function user(){
		return $this->belongsTo(User::class, 'user_id');
	}

	public function company(){
		return $this->belongsTo(Company::class);
	}

	public function assistant(){
		return $this->belongsTo(User::class, 'assistant_id');
	}

	public function hasConsultation(){
		if($this->consultationTime!=null){
			return true;
		}else{
			return false;
		}
	}

	public function consultationTime(){
		return $this->belongsTo(ConsultationTime::class);
	}
}
