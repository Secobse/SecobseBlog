@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<div style="background: #fff;">

<div class="container">
	<div class="jumbotron" style="margin-top: 70px;">
	<div style="color: white;">
	  <h2>Articles <small style="color: white;">Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</small></h2>
	  <p style="font-weight: bold;">Let's Begin!</p>
	</div>
	<p style="float: right;"><a class="btn btn-primary btn-lg" href="/articles/create" role="button" style="background: #f46b2c; border: none;">Create One</a></p>
	</div>
	<div class="row">
		@if(Session::has('status'))
				<div class="alert alert-success">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('status') }}
				</div>
		@endif

		<div class="col-md-7">
			@foreach($articles as $article)
				<div class="list-group">
				  <a href="{{ url('articles', $article->id) }}" class="list-group-item">
				    <h4 class="list-group-item-heading" style="margin-bottom:-13px;">Author: {{ $article->username }}
						<span class="label label-info pull-right_create">created-time: {{ $article->created_at }}</span>
				    </h4>
				    <p class="list-group-item-text">
				    	<h3>{{ $article->title }}</h3>
						<span class="label label-primary" style="margin-top:16px;margin-bottom: 12px;">readtimes: {{ $article->readtimes }}</span>

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
		</div>

		<div class="col-md-5">
		    @if(Session::has('error'))
			    <div class="alert alert-success">{{ Session::get('error') }}</div>
		    @endif

		    @include('articles.sideLeaderBoard')
		</div>
	</div>
</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
		$('div.alert').not('.alert-important').delay(3000).slideUp(500);
</script>
@endsection
