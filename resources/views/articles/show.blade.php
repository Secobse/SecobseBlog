@extends('layouts.app')

@section('title')
{{ $article->title }}
@endsection
@section('content')
<div class="container">
	<h1>{{ $article->title }}</h1>
	<em>Date:({{ $article->published_at }})</em>

	@foreach($users as $user)
	<em>Author: {{ $user->name }}</em>
	@endforeach

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