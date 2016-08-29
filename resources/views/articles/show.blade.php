@extends('layouts.app')

@section('content')
<div class="container">
	<h1>{{$article->title}}</h1>
    <em>发表时间:({{ $article->published_at }})</em>
	<hr>
	
	 <article>
	 	<div class="body">
	 		{{-- {{$article->content}} --}}
			{!! nl2br(e($article->content)) !!}
	 	</div>
	 </article>
	         
	<hr>
	<button class="btn btn-primary" onclick="history.go(-1)">
		« Back
	</button>
@endsection