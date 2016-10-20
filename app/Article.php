<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\DB;

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
	 * Scope a query find user tags.
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeUserTags($query)
	{
		$query = DB::table('articles')->join('article_tag', 'articles.id', '=', 'article_tag.article_id')
			->join('tags', 'article_tag.tag_id', '=', 'tags.id')
			->select('tags.name', 'tags.id')->where('articles.username', '=', Auth::user()->name);
		return $query;
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
	
	/**
	 * Article has many tags
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}
}
