@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">@foreach($user as $u)
            <img src="/uploads/avatars/{{ $u->avatar }}" alt="{{ $u->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" />
            <h2>
                {{ $u->name }} 's Profile
            </h2>

            @if ($u->isactive)
			<button class="btn btn-success" style="margin-top: 10px;"><i class="fa fa-heart" aria-hidden="true" style="padding-left: 2px;"></i>online</button>
			@else
			<button class="btn btn-danger" style="margin-top: 10px"><i class="fa fa-heart-o" aria-hidden="true" style="padding-left: 2px;"></i>offline</button>
			@endif
			<p style="position: relative; bottom: 30px; left: 100px;">last time login: {{ $u->updated_at }}</p>

			@foreach($articles as $article)
			<div class="panel panel-default" style="margin-top: 20px;">
			  <div class="panel-heading">
			  	<button class="btn btn-sm btn-primary">published-time<span class="badge">{{ $article->published_at }}</span></button>
				<button class="btn btn-sm btn-warning">updated-time<span class="badge">{{ $article->updated_at }}</span></button>
			  </div>
			  <div class="panel-body">
			    <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
			  </div>
			</div>
			@endforeach
			<nav>
			  <ul class="pager">
			    <li class="previous"><a href="{{ $articles->previousPageUrl() }}">&larr; Older</a></li>
			    <li class="next"><a href="{{ $articles->nextPageUrl() }}">Newer &rarr;</a></li>
			  </ul>
			</nav>

        @endforeach</div>
    </div>
</div>
@endsection
