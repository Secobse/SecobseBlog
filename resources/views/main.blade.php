@extends('layouts.app')

@section('title', 'Question')

@section('css')
<link rel="stylesheet" href="/css/other/main.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        @if(Session::has('status'))
        <div class="alert alert-success">
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('status') }}
        </div>
        @endif
        <div class="col-md-9">
            @foreach($questions as $question)
            <div class="singleQuestion">
                <div class="count">
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
                      <a href="{{url('tag/'.$tag->id.'')}}" class="label label-success tag">
                          {{ $tag->name }}
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
            </div>
            @endforeach
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
<script type="text/javascript" scr="/js/jquery-2.2.3.js"></script>
<script>
$(document).ready(function(){
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
});
</script>
@endsection
