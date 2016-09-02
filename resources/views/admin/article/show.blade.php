@extends('admin/default.app')

@section('title')
{{ $article->title }}
@endsection
@section('content')
<div class="container">
	<h1>{{ $article->title }}</h1>
	<em>Date:({{ $article->published_at }})</em>

	<em>Author: {{ $article->username }}</em>

	<hr>

	<article>
		<div class="body">
			@MarkDown($article->content)
		</div>
	</article>

	<hr>
	<button class="btn btn-primary" onclick="history.go(-1)">
		« Back
	</button>
</div>
@endsection
