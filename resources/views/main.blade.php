@extends('layouts.app')

@section('title', 'Question')

@section('content')
    <div style="background: #fff;">
        <a href="javascript:;" class="scrolltop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
        <div class="container">
            <div class="jumbotron" style="margin-top: 70px;">
                <div style="color: white;">
                    <h2>Question
                        <small style="color: white;">Page {{ $questions->currentPage() }}
                            of {{ $questions->lastPage() }}</small>
                    </h2>
                    <p style="font-weight: bold;">Let's Begin!</p>
                </div>
                <p style="float: right;"><a class="btn btn-primary btn-lg" href="/questions/create" role="button"
                                            style="background: #f46b2c; border: none;">Create One</a></p>
            </div>
            <div class="row">
                @if(Session::has('status'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('status') }}
                    </div>
                @endif

                <div class="col-md-7">
                    @foreach($questions as $question)
                        <div class="list-group">
                            <a href="{{ url('questions', $question->id) }}" class="list-group-item artilce_transform">
                                <h4 class="list-group-item-heading" style="margin-bottom:-13px;">
                                    Author: {{ $question->username }}
                                    <span class="label label-info pull-right_create">created-time: {{ $question->created_at }}</span>
                                </h4>
                                <p class="list-group-item-text">
                                <h3 style="margin-bottom:16px;margin-top: 32px;">{{ $question->title }}
                                    @unless($question->tags->isEmpty())
                                    @foreach ($question->tags as $tag)
                                        <span class="label label-success">
										{{ $tag->name }}
										</span>&nbsp;
                                    @endforeach
                                    @endunless
                                </h3>
                                <div class="list-group-content">
									<span class="label label-primary"
                                          style="float:left;margin-top:7px;">readtimes: {{ $question->readtimes }}</span>
                                </div>
                                </p>
                            </a>
                        </div>
                    @endforeach
                    <nav>
                       {{$questions->render()}}
                    </nav>
                </div>

                <div class="col-md-5">
                    @if(Session::has('error'))
                        <div class="alert alert-success">{{ Session::get('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" scr="/js/jquery-2.2.3.js"></script>
    <script type="text/javascript">
        $(function () {
            $('div.alert').not('.alert-important').delay(3000).slideUp(500);
            $(window).scroll(function () {
                var t = $(this).scrollTop();
                if (t > 200) {
                    $(".scrolltop").stop().fadeIn();
                } else {
                    $(".scrolltop").stop().fadeOut();
                }
            })
            $(".scrolltop").click(function () {
                $("html,body").stop().animate({scrollTop: 0}, 300)
            })
        });
    </script>
@endsection
