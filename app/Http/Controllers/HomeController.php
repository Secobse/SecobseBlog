<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Question;

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
    	$userQuestions = Question::userQuestions()->orderBy('published_at', 'desc')->Paginate(5);
		$user = DB::table('users')
			->where('name',  Auth::user()->name)
			->get();
		$tags = Question::UserTags()->distinct()->get();
        return view('home', compact('userQuestions','tags','user'));
    }
}
