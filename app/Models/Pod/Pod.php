<?php

namespace App\Models\Pod;

use Illuminate\Database\Eloquent\Model;

class Pod extends Model
{
    //
   protected $fillable = [
		    				'name',
		    				'description',
		    				'seed_path',
		    			];

	public function user(){

		return $this->belongsTo(User::class);
	}
}
