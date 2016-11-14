<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

class MainPageController extends Controller
{
    /**
     * show main page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$questions = Question::latest('created_at')->Paginate(15);
		$readered = Question::where('readtimes', '>', 0)->get()->sortBy('readtimes')->reverse()->slice(0, 5);
		$updated = Question::all()->sortBy('updated_at')->reverse()->slice(0, 5);
		return view('main', compact('questions', 'readered', 'loved', 'updated'));
    }
}
