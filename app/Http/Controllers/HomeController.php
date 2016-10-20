<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$userArticles = Article::userArticles()->orderBy('published_at', 'desc')->Paginate(5);
		$tags = Article::UserTags()->distinct()->get();
        return view('home', compact('userArticles','tags'));
    }
}
