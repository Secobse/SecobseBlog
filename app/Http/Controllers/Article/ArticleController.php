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
    /**
     * Show 5 articles with every page.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		$articles = Article::latest('published_at')->Paginate(5);
		return view('welcome', compact('articles'));
	}

    /**
     * Show single article.
     *
     * @return \Illuminate\Http\Response
     */
	public function showSingleArticle($id)
	{
		$article = Article::findOrFail($id);
		return view('articles.showSingleArticle', compact('article'));
	}
}
