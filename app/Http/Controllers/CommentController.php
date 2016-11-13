<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use GrahamCampbell\Markdown\Facades\Markdown;
use Auth;
class CommentController extends Controller
{
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request){
		$this->validate($request, [
			'content' => 'required',
		]);

		$id = $request->get('id');
		$commentable_id = $request->get('commentable_id');
		$content = $request->get('content');
		$user = Auth::user();

		$comment = Comment::create([
			'content' =>  $content,
			'html_content' => Markdown::convertToHtml($content),
			'commentable_id' => $commentable_id,
			'commentable_type' => $request->get('commentable_type'),
			'username' => $user->name,
			'user_id' =>$user->id,
		]);

		session()->flash('status', 'Comment has been published successfully!');

		return redirect('/questions/'.$id);
	}
}
