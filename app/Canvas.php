<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Canvas extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $table = 'canvases';
	protected $fillable = ['key_partners', 'key_activities', 'key_resources', 'value_propositions', 'customer_relationships', 'channels', 'customer_segments', 'cost_structure', 'revenue_streams'];

	public function company(){
		return $this->belongsTo(Company::class);
	}
}
