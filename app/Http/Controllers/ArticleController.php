<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Article;
use App\Vote;
use DB;
use GrahamCampbell\Markdown\Facades\Markdown;
class ArticleController extends Controller
{
    /**
     * Instantiate Articlecontroller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'index');
    }
    /**
     * Show 5 articles with every page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('created_at')->Paginate(5);
        return view('articles.index', compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.createArticle');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $article = Article::create([
            'title' => $title,
            'content' => $mdContent,
            'username' => Auth::user()->name,
        ]);
        session()->flash('status', 'Article has been published successfully!');
        return redirect('/articles');
    }
    /**
     * Show single article and author.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $article->readtimes += 1;
        $article->save();
        $article->content = Markdown::convertToHtml($article->content);
        return view('articles.show', compact('article'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mdContent' => 'required',
        ]);
        $article = Article::findOrFail($id);
        $article->content = $request->input('mdContent');
        $article->save();
        session()->flash('status', 'Article has been updated successfully!');
        return redirect('/articles/' . $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        session()->flash('status', 'Article has been deleted successfully!');
        return redirect('/home');
    }
    /**
     * love the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string $user
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
     * @param  int  $id
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