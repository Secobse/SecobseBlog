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
			    @if(Session::has('error'))
				    <div class="alert alert-success">{{ Session::get('error') }}</div>
			    @endif
				<div class="list-group">
				  <a href="{{ url('articles', $article->id) }}" class="list-group-item">
				    <h4 class="list-group-item-heading">Author: {{ $article->username }}
						<span class="label label-info pull-right">publised-time: {{ $article->published_at }}</span>
				    </h4>
				    <p class="list-group-item-text">
				    	<h3>{{ $article->title }}</h3>
						<a href="/articles/love/{{ $article->id }}" onclick="event.preventDefault();
                                                 document.getElementById('love-form').submit();"><span class="label label-danger pull-right"><i class="fa fa-heart-o" aria-hidden="true"></i>{{ $article->love }}</span>
</a>
                        <form id="love-form" action="/articles/love/{{ $article->id }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
						<a href="/articles/unLove/{{ $article->id }}" onclick="event.preventDefault();
                                                 document.getElementById('unlove-form').submit();"><span class="label label-success pull-right"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>
</a>
                        <form id="unlove-form" action="/articles/unLove/{{ $article->id }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
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