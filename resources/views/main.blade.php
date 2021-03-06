@extends('layouts.app')

@section('title', 'Question')

@section('css')
<link rel="stylesheet" href="/css/other/main.css">
@endsection

@section('content')


<div class="container">
  <div class="row">

    <div class="col-md-9">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#recent" role="tab" data-toggle="tab">Recent</a></li>
        <li role="presentation"><a href="#noanswer" role="tab" data-toggle="tab">No answer</a></li>
        <li role="presentation"><a href="#mostviewed" role="tab" data-toggle="tab">Most viewed</a></li>
      </ul>

        {{--rencentQuestions--}}
      <div class="tab-content question-content">
        <div role="tabpanel" class="tab-pane active" id="recent">
              @if(Session::has('status'))
              <div class="alert alert-success">
                  <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ Session::get('status') }}
              </div>
              @endif

                  @foreach($questions as $question)
                  <div class="singleQuestion">
                      <div class="count-wide">
                          <div><p>0</p><p>votes</p></div>
                          <div><p>{{ $question->answertimes }}</p><p>answers</p></div>
                          <div><p>{{ $question->readtimes }}</p><p>views</p></div>
                      </div>
                      <div class="details">
                        <div>
                            <a href="{{ url('questions', $question->id) }}">
                                <span>{{ $question->title }}</span>
                            </a>
                        </div>
                        <div class="tag-and-create-info">
                            @unless($question->tags->isEmpty())
                            @foreach ($question->tags as $tag)
                            <a href="{{url('tag/'.$tag->id.'')}}" class="tag">
                                <label class="label label-success">{{ $tag->name }}</label>
                            </a>
                            @endforeach
                            @endunless
                            <div class="create-info">
                              <a href="/profile/{{ $question->username }}">
                                  <span>{{ $question->username }}</span>
                              </a>
                              <span>created-time: {{ $question->created_at }}</span>
                            </div>
                        </div>
                      </div>
                      <div class="count-narrow">
                          <div><label for="vote" class="label label-default">votes: 0</label></div>
                          <div><label for="answer" class="label label-default">answers: {{ $question->answertimes }}</label></div>
                          <div><label for="view" class="label label-default">views: {{ $question->readtimes }}</label></div>
                      </div>
                  </div>
                  @endforeach


        </div>

          {{--noAnswerQuestions--}}
        <div role="tabpanel" class="tab-pane" id="noanswer">
                @if(Session::has('status'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('status') }}
                    </div>
                @endif

                    @foreach($noAnswerQuestion as $question)
                        <div class="singleQuestion">
                            <div class="count-wide">
                                <div><p>0</p><p>votes</p></div>
                                <div><p>{{ $question->answertimes }}</p><p>answers</p></div>
                                <div><p>{{ $question->readtimes }}</p><p>views</p></div>
                            </div>
                            <div class="details">
                                <div>
                                    <a href="{{ url('questions', $question->id) }}">
                                        <span>{{ $question->title }}</span>
                                    </a>
                                </div>
                                <div class="tag-and-create-info">
                                    @unless($question->tags->isEmpty())
                                        @foreach ($question->tags as $tag)
                                            <a href="{{url('tag/'.$tag->id.'')}}" class="tag">
                                                <label class="label label-success">{{ $tag->name }}</label>
                                            </a>
                                        @endforeach
                                    @endunless
                                    <div class="create-info">
                                        <a href="/profile/{{ $question->username }}">
                                            <span>{{ $question->username }}</span>
                                        </a>
                                        <span>created-time: {{ $question->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="count-narrow">
                                <div><label for="vote" class="label label-default">votes: 0</label></div>
                                <div><label for="answer" class="label label-default">answers: {{ $question->answertimes }}</label></div>
                                <div><label for="view" class="label label-default">views: {{ $question->readtimes }}</label></div>
                            </div>
                        </div>
                    @endforeach

        </div>

          {{--mostViewQuestions--}}
        <div role="tabpanel" class="tab-pane" id="mostviewed">
                @if(Session::has('status'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('status') }}
                    </div>
                @endif

                    @foreach($mostViewQuestion as $question)
                        <div class="singleQuestion">
                            <div class="count-wide">
                                <div><p>-1</p><p>votes</p></div>
                                <div><p>{{ $question->answertimes }}</p><p>answers</p></div>
                                <div><p>{{ $question->readtimes }}</p><p>views</p></div>
                            </div>
                            <div class="details">
                                <div>
                                    <a href="{{ url('questions', $question->id) }}">
                                        <span>{{ $question->title }}</span>
                                    </a>
                                </div>
                                <div class="tag-and-create-info">
                                    @unless($question->tags->isEmpty())
                                        @foreach ($question->tags as $tag)
                                            <a href="{{url('tag/'.$tag->id.'')}}" class="tag">
                                                <label class="label label-success">{{ $tag->name }}</label>
                                            </a>
                                        @endforeach
                                    @endunless
                                    <div class="create-info">
                                        <a href="/profile/{{ $question->username }}">
                                            <span>{{ $question->username }}</span>
                                        </a>
                                        <span>created-time: {{ $question->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="count-narrow">
                                <div><label for="vote" class="label label-default">votes: 0</label></div>
                                <div><label for="answer" class="label label-default">answers: {{ $question->answertimes }}</label></div>
                                <div><label for="view" class="label label-default">views: {{ $question->readtimes }}</label></div>
                            </div>
                        </div>
                    @endforeach`
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="qus-create">
          <p>All Questions About Development</p>
          <p><a class="btn btn-success btn-block" href="/questions/create" role="button">Ask Questions</a></p>
          <p>Begin!</p>
      </div>
      <div class="list-group recomm">
          <h4 class="recomm-tit">Recommend author</h4>
          <ol>
              <li>
                  <img src="/uploads/avatars/default.jpg" />
                  <a href="#">loner11</a>
              </li>
              <li>
                  <img src="/uploads/avatars/default.jpg" />
                  <a href="#">loner11</a>
              </li>
              <li>
                  <img src="/uploads/avatars/default.jpg" />
                  <a href="#">loner11</a>
              </li>
              <li>
                  <img src="/uploads/avatars/default.jpg" />
                  <a href="#">loner11</a>
              </li>
              <li>
                  <img src="/uploads/avatars/default.jpg" />
                  <a href="#">loner11</a>
              </li>
          </ol>
      </div>
    </div>
  </div>
</div>

<div class="container">
    @if(Session::has('error'))
    <div class="alert alert-success">{{ Session::get('error') }}</div>
    @endif
    <footer>
       <!-- footer content -->
       <div class="footer">
           <div class="container">
               <div class="row">
                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   　　<h3>Find us on github</h3>
                      <ul>
                           <li><a href="https://github.com/G1enY0ung">G1enY0ung</a></li>
                           <li><a href="https://github.com/Gasbylei">Gasbylei</a></li>
                           <li><a href="https://github.com/happylwp">happylwp</a></li>
                           <li><a href="https://github.com/loner11">loner11</a></li>
                           <li><a href="https://github.com/Th0rns">Th0rns</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <!-- footer bottom -->
       <div class="footer-bottom">
           <div class="container">
               <p class=""> Copyright &copy; Secobse. 2016  All right reserved. </p>
           </div>
       </div>
   </footer>
</div>
<!-- scroll to top -->
<a href="#" class="scrollToTop"><i class="fa fa-angle-up fa-2x" aria-hidden="true"></i></a>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    var count = $(".count-wide");
    var greenOrRed = count.each(function(index, object) {
      for (var i = 0; i < 3; i++)
        helper(i, object);
    });
});

var helper = function(index, object) {

  var d = $($($(object).children()[index]));
  var content = $(d.children()[0]).text();

  console.log(content);

  if (content > 0)
    d.css("color", "green");
  if (content < 0)
    d.css("color", "red");
};
</script>
@endsection
