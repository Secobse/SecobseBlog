@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div style="background: #fff;">
        <a href="javascript:;" class="scrolltop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
        <div class="container">
            <div class="jumbotron" style="margin-top: 70px;">
                <div style="color: white;">
                    <h2>Articles
                        <small style="color: white;">Page {{ $articles->currentPage() }}
                            of {{ $articles->lastPage() }}</small>
                    </h2>
                    <p style="font-weight: bold;">Let's Begin!</p>
                </div>
                <p style="float: right;"><a class="btn btn-primary btn-lg" href="/articles/create" role="button"
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
                    @foreach($articles as $article)
                        <div class="list-group">
                            <a href="{{ url('articles', $article->id) }}" class="list-group-item artilce_transform">
                                <h4 class="list-group-item-heading" style="margin-bottom:-13px;">
                                    Author: {{ $article->username }}
                                    <span class="label label-info pull-right_create">created-time: {{ $article->created_at }}</span>
                                </h4>
                                <p class="list-group-item-text">
                                <h3 style="margin-bottom:16px;margin-top: 32px;">{{ $article->title }}
                                    @unless($article->tags->isEmpty())
                                    @foreach ($article->tags as $tag)
                                        <span class="label label-success">
										{{ $tag->name }}
										</span>&nbsp;
                                    @endforeach
                                    @endunless
                                </h3>
                                <div class="list-group-content">
									<span class="label label-primary"
                                          style="float:left;margin-top:7px;">readtimes: {{ $article->readtimes }}</span>
                                    <form action="{{ route('love') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $article->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger pull-right"
                                                style="padding:0px;display:block;width:24px;height:24px;text-align:center;line-height:24px;">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>{{ $article->love }}
                                        </button>
                                    </form>

                                    <form action="{{ route('unlove') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $article->id }}">
                                        <button type="submit" class="btn btn-sm btn-success pull-right"
                                                style="padding:0px;display:block;width:24px;height:24px;text-align:center;line-height:24px;">
                                            <i class="fa fa-thumbs-down" aria-hidden="true"></i>{{ $article->unLove }}
                                        </button>
                                    </form>
                                </div>
                                </p>
                            </a>
                        </div>
                    @endforeach
                    <nav>
                       {{$articles->render()}}
                    </nav>
                </div>

                <div class="col-md-5">
                    @if(Session::has('error'))
                        <div class="alert alert-success">{{ Session::get('error') }}</div>
                    @endif

                    @include('articles.sideLeaderBoard')
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
