<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    use SoftDeletes;
	
	protected $table = 'events';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
	
	
	protected static function boot()
    {
        if((\Auth::check() && \Auth::user()->type=='Employee')==false) {
        parent::boot();

        static::addGlobalScope('status', function (Builder $builder) {
            $builder->where('status', '=', 'public');
        });
    }
    }
    
public function category() 
   {
      return $this->belongsTo('\App\Models\Event_category','category_id','id');
   }
   
   public function pTown() {
       return $this->belongsTo('\App\Models\Town','town','id');
   }
}
