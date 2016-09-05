@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<div class="container">
	<div class="row">
		@if(Session::has('status'))
				<div class="alert alert-success">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('status') }}
				</div>
		@endif
		<div class="col-md-4">
			<h1>Articles</h1>
			<h5>Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</h5>
		    @if(Session::has('error'))
			    <div class="alert alert-success">{{ Session::get('error') }}</div>
		    @endif

		    @include('articles.sideLeaderBoard')
		</div>

		<div class="col-md-6">
			@foreach($articles as $article)
				<div class="list-group">
				  <a href="{{ url('articles', $article->id) }}" class="list-group-item">
				    <h4 class="list-group-item-heading">Author: {{ $article->username }}
						<span class="label label-info pull-right">created-time: {{ $article->created_at }}</span>
				    </h4>
				    <p class="list-group-item-text">
				    	<h3>{{ $article->title }}</h3>
						<span class="label label-primary">readtimes: {{ $article->readtimes }}</span>

                        <form action="{{ route('love') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $article->id }}">
							<button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-heart-o" aria-hidden="true"></i>{{ $article->love }}</button>
                        </form>

                        <form action="{{ route('unlove') }}" method="POST">
                            {{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $article->id }}">
							<button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-thumbs-down" aria-hidden="true"></i>{{ $article->unLove }}</button>
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

@section('js')
<script type="text/javascript">
		$('div.alert').not('.alert-important').delay(3000).slideUp(500);
</script>
@endsection
