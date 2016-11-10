<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';

	protected $fillable = ['user_id','content', 'html_content', 'commentable_type','username','commentable_id'];

	public function commentable()
	{
		return $this->morphTo();
	}
}
