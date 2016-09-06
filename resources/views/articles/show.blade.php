@extends('layouts.app')

@section('title')
{{ $article->title }}
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
		<div class="col-md-6 col-md-offset-3">
			<h1>{{ $article->title }}</h1>
				<em>Date:({{ $article->published_at }})</em>

				<em>Author: <a href="/profile/{{ $article->username }}">{{ $article->username }}</a></em>

				<hr>

				<article>
					<div class="body" style="text-indent:2em;">
						@MarkDown($article->content)
					</div>
				</article>
		</div>
	</div>

	<hr>
	<button class="btn btn-primary" onclick="history.go(-1)">
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
@endsection

@section('js')
<script type="text/javascript">
		$('div.alert').not('.alert-important').delay(3000).slideUp(500);
</script>
@endsection
