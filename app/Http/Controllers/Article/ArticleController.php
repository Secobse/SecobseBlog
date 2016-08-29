<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Article;

use Carbon\Carbon;

class ArticleController extends Controller
{
	public function index()
	{

		$articles = Article::latest('published_at')->Paginate(5);
		return view('welcome', compact('articles'));
	}

	public function showSingleArticle($id)
	{
		$article = Article::findOrFail($id);
		return view('articles.showSingleArticle', compact('article'));
	}
}
