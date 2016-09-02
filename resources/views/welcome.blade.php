@extends('layouts.app')

@section('title','Secobse')

@section('content')
<div class="container-fluid">
	<div class="row">
  		<div class="col-md-6 col-md-offset-3">
			<h1>articles</h1>
			<h5>Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</h5>
			<!-- <hr> -->
			@foreach($articles as $article)
			<div class="art-whole float-size">
				<!-- author information -->
				<div class="author_infor">
					<h6 class="author_name format-content">Author:</h6>
					<h6 class="publish_al format-content LeftTime">{{$article->published_at}}</h6>
					<!-- clear float -->

					<h6 class="author_infor"></h6>
				</div>

			<h3  class="arttitle format-content"><a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a></h3>

			<article>
				<nav>
		          <ul class="pager format-content">
		            <li class="previous">
		              <a href="#">
		                READ<span class="badge" style="margin-left:2px;">4</span></a></li>
		            <li class="next"><a href="{{ url('articles', $article->id) }}">More<span aria-hidden="true">&rarr;</span></a></li>
		          </ul>
		        </nav>
			</article>
		</div>
	@endforeach
	{!! $articles->render() !!}
	  </div>
	 <!--  <div class="col-md-3">
	  	 <div class="Ranking">
	  		<div id="tab-list">
		  		<span class="tab-left">RANKING LIST</span>
		     	<ul id="tab-ul tab-right">
		           <li class="tab-active" onclick="tabCard()">Today</li>
		           <li onclick="tabCard()">Week</li>
		           <li onclick="tabCard()">Month</li>
		      	</ul>

		      	<div>
		          <ol>
		              <li><a href="javascript:;">First</a></li>
		              <li><a href="javascript:;">Second</a></li>
		              <li><a href="javascript:;">Third</a></li>
		              <li><a href="javascript:;">Forth</a></li>
		          </ol>
		      	</div>    
		      	<div class="hide">
		          <ol>
		              <li><a href="javascript:;">First1</a></li>
		              <li><a href="javascript:;">Second1</a></li>
		              <li><a href="javascript:;">Third1</a></li>
		              <li><a href="javascript:;">Forth1</a></li>
		          </ol>
		      	</div>    
		      	<div class="hide">
		          <ol>
		              <li><a href="javascript:;">First2</a></li>
		              <li><a href="javascript:;">Second2</a></li>
		              <li><a href="javascript:;">Third2</a></li>
		              <li><a href="javascript:;">Forth2</a></li>
		          </ol>
		      	</div>
	  		</div> -->
	</div> 
</div>
@endsection