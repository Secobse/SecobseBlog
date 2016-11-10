@extends('layouts.app')

@section('title', 'Question')

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
            <div class="qus-list-st">
                <div class="comms-rdts">
                    <div class="comms">{{ $question->answertimes }}<br/><i class="fa fa-comments fa-2x" aria-hidden="true"></i></div>
                    <div class="rdts">{{ $question->readtimes }}<br/><i class="fa fa-eye fa-2x" aria-hidden="true"></i></div>
                </div>
                <div class="author-crt">
                    <a href="/profile/{{ $question->username }}">
                        <span class="author">
                            {{ $question->username }}
                        </span>
                    </a>
                    <span class="crt">created-time: {{ $question->created_at }}</span>
                </div>
                <div class="qus-tit-tag">
                    <a href="{{ url('questions', $question->id) }}">
                        <span class="qus-tit">{{ $question->title }}</span>
                    </a>
                    @unless($question->tags->isEmpty())
                    @foreach ($question->tags as $tag)
                    <a href="{{url('tag/'.$tag->id.'')}}">
                        <span class="qus-tag">{{ $tag->name }}&nbsp;</span>
                    </a>
                    @endforeach
                    @endunless
                </div>
            </div>
            @endforeach
            <nav class="qus-paging">
                {{$questions->render()}}
            </nav>
        </div>
        <div class="col-md-3">
            <div class="qus-create">
                <p>What question do you have?</p>
                <p><a class="btn btn-success btn-block" href="/questions/create" role="button">Ask Questions</a></p>
                <p>Let's Begin!</p>
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
