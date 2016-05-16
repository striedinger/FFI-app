<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultationTime extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['consultation_id', 'time', 'available'];

	public function consultation(){
		return $this->belongsTo(Consultation::class);
	}
}
