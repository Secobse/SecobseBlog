@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h1>Articles</h1>
			<h5>Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</h5>
		</div>

		<div class="col-md-6">
			@foreach($articles as $article)
				<div class="list-group">
				  <a href="{{ url('articles', $article->id) }}" class="list-group-item">
				    <h4 class="list-group-item-heading">Author: {{ $article->username }}
						<span class="label label-info pull-right">publised-time: {{ $article->published_at }}</span>
				    </h4>
				    <p class="list-group-item-text">
				    	<h3>{{ $article->title }}</h3>
				    </p>
				  </a>
				</div>
			@endforeach
			<nav>
			  <ul class="pager">
			    <li class="previous"><a href="{{ $articles->previousPageUrl() }}">&larr; Older</a></li>
			    <li class="next"><a href="{{ $articles->nextPageUrl() }}">Newer &rarr;</a></li>
			  </ul>
			</nav>
			<hr>
		</div>
	</div>
</div>
@endsection