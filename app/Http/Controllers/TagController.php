<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Article;

class TagController extends Controller
{
	public function show($id)
	{
		$tag = Tag::find($id);
		$articles = $tag->articles()->orderBy('created_at')->paginate(6);
		$readered = Article::where('readtimes', '>', 0)->get()->sortBy('readtimes')->reverse()->slice(0, 5);
		$loved = Article::where('love', '>', 0)->get()->sortBy('love')->reverse()->slice(0, 5);
		$updated = Article::all()->sortBy('updated_at')->reverse()->slice(0, 5);
		return view('tags.articles', compact('tag', 'articles', 'readered', 'loved', 'updated'));
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
