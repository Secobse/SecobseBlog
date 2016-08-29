@extends('layouts.app')

@section('content')
<div class="container">
	<h1>{{$article->title}}</h1>
    <em>Date:({{ $article->published_at }})</em>
	<hr>

	 <article>
	 	<div class="body">
	 		{{$article->content}}
	 	</div>
	 </article>

	<hr>
	<button class="btn btn-primary" onclick="history.go(-1)">
		« Back
	</button>
@endsection