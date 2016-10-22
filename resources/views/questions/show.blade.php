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
			<i class="glyphicon glyphicon-calendar"></i><em style="font-size:14px;margin-right:60%;">Date:({{ $question->published_at }})</em>

			<i class="glyphicon glyphicon-user"></i><em style="font-size:14px;">Author: <a href="/profile/{{ $question->username }}">{{ $question->username }}</a></em>
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

	<button class="btn btn-default" onclick="history.go(-1)">
		« Back
	</button>

	<div id="disqus_thread"></div>
	<script>

	/**
	 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
	 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
	/*
	var disqus_config = function () {
	    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
	    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
	};
	*/
	(function() { // DON'T EDIT BELOW THIS LINE
	    var d = document, s = d.createElement('script');
	    s.src = '//secobse.disqus.com/embed.js';
	    s.setAttribute('data-timestamp', +new Date());
	    (d.head || d.body).appendChild(s);
	})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<script id="dsq-count-scr" src="//secobse.disqus.com/count.js" async></script>
</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
		$(function(){
			$('div.alert').not('.alert-important').delay(3000).slideUp(500);
			$(window).scroll(function(){
				var t=$(this).scrollTop();
				if(t>200){
					$(".scrolltop").stop().fadeIn();
				}else{
					$(".scrolltop").stop().fadeOut();
				}
			})
			$(".scrolltop").click(function(){
				$("html,body").stop().animate({scrollTop:0},300)
			})
		});
</script>
@endsection
