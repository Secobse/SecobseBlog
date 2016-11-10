<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Question;
use App\Tag;
use App\Vote;
use Illuminate\Support\Facades\DB;
use GrahamCampbell\Markdown\Facades\Markdown;

class QuestionController extends Controller
{
	/**
	 * Instantiate Questioncontroller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth')->except('show', 'index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$tags = Tag::pluck('name', 'id')->all();
		return view('questions.createQuestion', compact('tags'));
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
			'title' => 'required|max:50',
			'mdContent' => 'required',
		]);

		$title = $request->input('title');
		$mdContent = $request->input('mdContent');

		$question = Question::create([
			'title' => $title,
			'content' => $mdContent,
			'username' => Auth::user()->name,
		]);

		$question->tags()->attach($request->input('tags'));

		session()->flash('status', 'Question has been published successfully!');

		return redirect('/');
	}

	/**
	 * Show single question and author.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$question = Question::findOrFail($id);

		$question->readtimes += 1;

		$question->content = Markdown::convertToHtml($question->content);

		$answer = Answer::all()->where('question_id',$id);
		$count = $answer->count('id');
		$question->answertimes = $count;
		$question->save();
		return view('questions.show', compact('question','answer','count'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$question = Question::findOrFail($id);
		$tags = Tag::all();
		return view('questions.edit', compact('question', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'mdContent' => 'required',
		]);

		$question = Question::findOrFail($id);

		$question->content = $request->input('mdContent');

		$question->tags()->sync($request->input('tags'));

		$question->save();

		session()->flash('status', 'Question has been updated successfully!');

		return redirect('/questions/' . $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$question = Question::findOrFail($id);

		$question->delete();

		session()->flash('status', 'Question has been deleted successfully!');

		return redirect('/home');
	}

}