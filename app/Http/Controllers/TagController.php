<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Question;

class TagController extends Controller
{
	public function show($id)
	{
		$tag = Tag::find($id);
		$questions = $tag->questions()->orderBy('created_at')->paginate(6);
		$readered = Question::where('readtimes', '>', 0)->get()->sortBy('readtimes')->reverse()->slice(0, 5);
		$updated = Question::all()->sortBy('updated_at')->reverse()->slice(0, 5);
		return view('tags.questions', compact('tag', 'questions', 'readered', 'updated'));
	}

	public function store(Request $request){
		$this->validate($request, [
			'name' => 'required',
		]);
		$tag= new Tag();
		$tag->name = $request->get('name');
		$tag->save();
		return $tag;
	}
}
