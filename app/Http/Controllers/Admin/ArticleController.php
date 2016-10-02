<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use GrahamCampbell\Markdown\Facades\Markdown;

class ArticleController extends Controller
{
  /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function index()
   {
       $articles = Article::latest('published_at')->Paginate(7);
	   $tags = Article::UserTags()->get();
       return view('admin.article.index',compact('articles','tags'));
   }

   /**
    * Show  article and author.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
       $article = Article::findOrFail($id);

       $article->content = Markdown::convertToHtml($article->content);

       return view('admin.article.show', compact('article'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
       $article = Article::findOrFail($id);
       return view('admin.article.edit', compact('article'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update(Request $request,$id)
   {
       $this->validate($request, [
           'mdContent' => 'required',
       ]);

       $article = Article::findOrFail($id);

       $article->content = $request->input('mdContent');

       $article->save();

       return redirect('/admin/articles/' . $id);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
       $article = Article::find($id);

       $article->delete();

       return redirect('/admin/articles');
   }

}
