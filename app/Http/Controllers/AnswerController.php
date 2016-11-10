<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use GrahamCampbell\Markdown\Facades\Markdown;

class AnswerController extends Controller
{
	/**
	 * Instantiate Questioncontroller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index() {
		$answers = Answer::all();
		return view('questions.show', compact('answers'));
	}

	public function store(Request $request) {
		$this->validate($request, [
			'answer_content' => 'required'
		]);
		$question_id = $request->get('question_id');
		$content = $request->input('answer_content');
		$answer = Answer::create([
			'answer_content' => $content ,
			'html_content' => Markdown::convertToHtml($content),
			'answer_name' => Auth::user()->name,
			'avatar' => Auth::user()->avatar,
			'question_id' => $question_id,

		]);

		session()->flash('status', 'Answer has been published successfully!');
		return redirect('/questions/'.$question_id);
	}
}
