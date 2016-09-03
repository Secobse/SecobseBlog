@extends('layouts.app')

@section('title')
{{ $article->title }}
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>{{ $article->title }}</h1>
				<em>Date:({{ $article->published_at }})</em>

				<em>Author: <a href="/profile/{{ $article->username }}">{{ $article->username }}</a></em>

				<hr>

				<article>
					<div class="body">
						@MarkDown($article->content)
					</div>
				</article>
		</div>
	</div>

	<hr>
	<button class="btn btn-primary" onclick="history.go(-1)">
		« Back
	</button>
</div>
@endsection