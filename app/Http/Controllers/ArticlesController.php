<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use Carbon\Carbon;

class ArticlesController extends Controller
{
	public function index()
	{
			
		$articles = Article::latest('published_at')->published()->Paginate(5);
		return view('welcome', compact('articles'));
	}

	public function show($id)
	{
		$article = Article::findOrFail($id);
		return view('articles.show', compact('article'));
	}
}
