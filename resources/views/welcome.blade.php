@extends('layouts.app')

@section('title', 'Secobse')

@section('content')
<div class="container">
	<h1>articles</h1>
	<h5>Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</h5>
	<hr>
	@foreach($articles as $article)
	<h3><a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a></h3>
	@endforeach
	<hr>
	{!! $articles->render() !!}
</div>
@endsection