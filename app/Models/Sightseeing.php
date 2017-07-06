<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sightseeing extends Model
{
    use SoftDeletes;
	
	protected $table = 'sightseeings';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
	
		public function parent() 	   {
	      return $this->belongsTo('\App\Models\Town','town','id');
	   }
}
