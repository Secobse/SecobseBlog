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
	 * Instantiate AnswerController instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'answer_content' => 'required'
		]);

		$question_id = $request->get('question_id');
		$content = $request->input('answer_content');
		$user = Auth::user();

		$query = \DB::table('answers')->select('answer_name')
			->where('question_id', $question_id)
			->where('answer_name', $user->name)
			->get()->all();

		if ($query) {
			session()->flash('status', 'You have answered!');
		} else {
			$answer = Answer::create([

				'answer_name' => $user->name,
				'answer_content' => $content,
				'html_content' => Markdown::convertToHtml($content),
				'avatar' => $user->avatar,
				'question_id' => $question_id,

			]);

			session()->flash('status', 'Answer has been published successfully!');
		}

		return redirect('/questions/' . $question_id);
	}
}
