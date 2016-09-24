<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class MainPageController extends Controller
{
    /**
     * show main page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$articles = Article::latest('created_at')->Paginate(6);
		$readered = Article::where('readtimes', '>', 0)->get()->sortBy('readtimes')->reverse()->slice(0, 5);
		$loved = Article::where('love', '>', 0)->get()->sortBy('love')->reverse()->slice(0, 5);
		$updated = Article::all()->sortBy('updated_at')->reverse()->slice(0, 5);
		return view('welcome', compact('articles', 'readered', 'loved', 'updated'));
    }
}
