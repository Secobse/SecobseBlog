<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';

	protected $fillable = ['user', 'questionId'];

	public $timestamps = false;
}
