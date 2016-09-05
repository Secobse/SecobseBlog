<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Vote extends Model
{
    protected $table = 'votes';
	protected $fillable = ['user', 'articleId', 'isLove', 'isUnLove'];
	public $timestamps = false;
}