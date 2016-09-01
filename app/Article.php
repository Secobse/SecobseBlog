<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Article extends Model
{
	protected $table = 'articles';

	protected $fillable=['title', 'content', 'username'];

    /**
     * Scope a query find user articles.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserArticles($query)
    {
        return $query->where('username', Auth::user()->name);
    }
}
