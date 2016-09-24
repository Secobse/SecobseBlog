<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Auth;

class Article extends Model
{
	protected $table = 'articles';

	protected $fillable = ['title', 'content', 'username'];

    /**
     * Scope a query find user articles.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserArticles($query)
    {
        return $query->where('username', Auth::user()->name);
    }
		/**
		 * Restrict created_at time display format.
		 *
		 * @return \Carbon\Carbon
		 */
		public function getCreatedAtAttribute($date)
		{
			if (Carbon::now() < Carbon::parse($date)) {
					return Carbon::parse($date);
			}

			return Carbon::parse($date)->diffForHumans();
		}

}
