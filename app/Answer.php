<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
	/**
	 * 与模型关联的数据表
	 *
	 * @var string
	 */
	protected $table = 'answers';

	protected $fillable = ['answer_name', 'answer_content','html_content','question_id','avatar'];

	/**
	 * Get the question that owns the answer.
	 */
	public function question()
	{
		return $this->belongsTo('App\Question');
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

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}

}
