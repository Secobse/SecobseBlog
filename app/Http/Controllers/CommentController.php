<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use GrahamCampbell\Markdown\Facades\Markdown;
use Auth;
class CommentController extends Controller
{
	public function store(Request $request){
		$this->validate($request, [
			'content' => 'required',
		]);
		$id = $request->get('id');
		$commentable_id = $request->get('commentable_id');
//		$commentable = app($request->get('commentable_type'))->where('id', $commentable_id)->firstOrFail();
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
