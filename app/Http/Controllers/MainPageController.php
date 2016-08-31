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
        $articles = Article::latest('published_at')->Paginate(5);
        return view('welcome', compact('articles'));
    }
}
