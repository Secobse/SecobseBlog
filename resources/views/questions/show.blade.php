@extends('layouts.app')

@section('title')
	{{ $question->title }}
@endsection
@section('content')
	<div style="background-color:#fff;">
		<a href="javascript:;" class="scrolltop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
		<div class="container">
			<div class="row">
				@if(Session::has('status'))
					<div class="alert alert-success">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('status') }}
					</div>
				@endif
				<div class="col-md-8 col-md-offset-2 article_show_item">
					<h1 style="text-align:center;">{{ $question->title }}</h1>
					<hr style="border-width:2px;border-top-color:rgba(125, 116, 122, 0.98)">
					<i class="glyphicon glyphicon-calendar"></i><em
							style="font-size:14px;margin-right:60%;">Date:({{ $question->published_at }})</em>

					<i class="glyphicon glyphicon-user"></i><em style="font-size:14px;">Author: <a
								href="/profile/{{ $question->username }}">{{ $question->username }}</a></em>
					@unless($question->tags->isEmpty())
						<em>Tags:<i class="glyphicon glyphicon-tags"></i>
							@foreach($question->tags as $tag)
								<a href="{{url('tag/'.$tag->id.'')}}">{{ $tag->name }}&nbsp;</a>
							@endforeach
						</em>
					@endunless
					<article style="margin-top:20px">
						<div class="body">
							@MarkDown($question->content)
							<hr class="article-show_footline">
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div>
			<span>{{$count}}:Answer</span>
			<hr>
		</div>
		@include('questions.comment')

	</div>
	@if (Auth::guest())
		<div class="container">
			<h3 align="center">登录后可以提交回答
				<button type="button" id="tologin" class="btn btn-primary">login</button>
			</h3>
		</div>
	@else
		<div class="container">
			<div><h3>撰写回答:</h3></div>
			<form id="answer" action="/answer" method="POST" class="form-horizontal">
				<input type="hidden" name="question_id" id="question_id" value="{{ $question->id }}">
				<textarea name="answer_content" id="answerEditor"></textarea>
				{!! csrf_field() !!}
				<button type="submit" id="tsave" class="btn btn-primary">Submit Answer</button>
			</form>


			@if ($errors->has('mdContent'))
				<span class="help-block">
				<strong>{{ $errors->first('mdContent') }}</strong>
			</span>
			@endif
		</div>
	@endif
@endsection

@section('js')
	<link href="/css/simplemde.min.css" rel="stylesheet">
	<script src="/js/simplemde.min.js"></script>
	<script>
		$('#tologin').click(function () {
			$('#login').modal('show');
		});
	</script>
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
			});
			$(".scrolltop").click(function () {
				$("html,body").stop().animate({scrollTop: 0}, 300)
			})
		});
	</script>
	<script>
		var simplemde = new SimpleMDE({
			element: $("#answerEditor")[0],
			codeSyntaxHighlighting: true
		});
		var comment = new SimpleMDE({
			element: $("#comment")[0],
			toolbar: false,
			toolbarTips: false
		});
	</script>
@endsection
