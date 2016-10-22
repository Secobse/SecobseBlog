<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use GrahamCampbell\Markdown\Facades\Markdown;

class QuestionController extends Controller
{
  /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function index()
   {
       $questions = Question::latest('published_at')->Paginate(7);

       return view('admin.question.index',compact('questions'));
   }

   /**
    * Show  question and author.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
       $question = Question::findOrFail($id);

       $question->content = Markdown::convertToHtml($question->content);

       return view('admin.question.show', compact('question'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
       $question = Question::findOrFail($id);
       return view('admin.question.edit', compact('question'));
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

       $question = Question::findOrFail($id);

       $question->content = $request->input('mdContent');

       $question->save();

       return redirect('/admin/questions/' . $id);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
       $question = Question::find($id);

       $question->delete();

       return redirect('/admin/questions');
   }

}
