<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['name'];

	public $timestamps = false;
	/**
	 * Tags has many questions
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function questions()
	{
		return $this->belongsToMany('App\Question');
	}
}
