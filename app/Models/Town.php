<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Town extends Model
{
    use SoftDeletes;
	
	protected $table = 'towns';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
	
	public function parent() 	   {
	      return $this->belongsTo('\App\Models\Region','region','id');
	   }
	   
	   	
	public function svgmap() 	   {
	      return $this->belongsTo('\App\Models\Svgmap','id','town');
	   }	
}
