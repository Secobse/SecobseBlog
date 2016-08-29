<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    		protected $dates = ['published_at'];

		protected $table = 'articles';

    		protected $fillable=['title','content','published_at','user_id'];

    		public function setPublishedAtAttribute($date)
    		{
			
			$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d ', $date);
			        
	  	}
  	
  		public function scopePublished($query)
  		{
            			$query->where('published_at', '<=', Carbon::now());
		}

		public function user()
		{
			return $this->belongsTo('App\User');
		}
}
