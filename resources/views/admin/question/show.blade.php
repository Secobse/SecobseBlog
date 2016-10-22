@extends('admin/default.app')

@section('title')
{{ $question->title }}
@endsection
@section('content')
<div class="container">
	<h1>{{ $question->title }}</h1>
	<em>Date:({{ $question->published_at }})</em>

	<em>Author: {{ $question->username }}</em>
	@unless($question->tags->isEmpty())
		<em>Tags:<i class="glyphicon glyphicon-tags"></i>
			@foreach($question->tags as $tag)
				<a href="{{url('tag/'.$tag->id.'')}}">{{ $tag->name }}&nbsp;</a>
			@endforeach
		</em>
	@endunless

	<hr>

	<article>
		<div class="body">
			@MarkDown($question->content)
		</div>
	</article>

	<hr>
	<button class="btn btn-primary" onclick="history.go(-1)">
		« Back
	</button>
</div>
@endsection
