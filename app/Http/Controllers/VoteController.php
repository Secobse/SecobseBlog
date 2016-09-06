<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Article;
use App\Vote;

class VoteController extends Controller
{
	public function getLove() {
		return redirect('/articles');
	}

	public function getUnLove() {
		return redirect('/articles');
	}

    /**
     * love the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function love(Request $request)
    {
        $id = $request->input('id');
        $user = Auth::user()->name;

        $article = Article::findOrFail($id);

        if ($vote = Vote::where('articleId', $id)
                            ->where('user', $user)
                            ->first()) {
            if ($vote->isLove == 1) {

                $request->session()->flash('error','remove love it');

                Vote::where('user', $user)
                        ->where('articleId', $id)
                        ->update(['isLove' => 0]);

                $article->love -= 1;

                $article->save();

            } else {

                Vote::where('user', $user)
                        ->where('articleId', $id)
                        ->update(['isLove' => 1]);

                $article->love += 1;

                $article->save();
            }

        } else {
            $vote = Vote::firstOrCreate([
                'user' => $user,
                'articleId' => $id,
                'isLove' => 1,
                'isUnLove' => 0,
            ]);

            $article->love += 1;

            $article->save();
        }

        return redirect('/articles');
    }

    /**
     * unlove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $Request
     * @return \Illuminate\Http\Response
     */
    public function unLove(Request $request)
    {
        $id = $request->input('id');
        $user = Auth::user()->name;

        $article = Article::findOrFail($id);

        if ($vote = Vote::where('user', $user)
                            ->where('articleId', $id)
                            ->first()) {
            if ($vote->isUnLove == 1) {

                $request->session()->flash('error','remove unlove it');

                Vote::where('user', $user)
                        ->where('articleId', $id)
                        ->update(['isUnLove' => 0]);

                $article->unLove -= 1;

                $article->save();

            } else {

                Vote::where('user', $user)
                        ->where('articleId', $id)
                        ->update(['isUnLove' => 1]);

                $article->unLove += 1;

                $article->save();

            }

        } else {

            $vote = Vote::firstOrCreate([
                'user' => $user,
                'articleId' => $id,
                'isLove' => 0,
                'isUnLove' =>1,
            ]);

            $article->unLove += 1;

            $article->save();
        }

        return redirect('/articles');
    }
}
