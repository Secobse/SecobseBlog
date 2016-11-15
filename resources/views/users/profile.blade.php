@extends('layouts.app')

@section('title', 'Profile')

@section('css')
<link rel="stylesheet" href="{{ asset('css/other/profile.css') }}">
@endsection('css')

@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-md-6 col-md-offset-3">
        @foreach($user as $u)
        	<div class="user-info">
	        	<div class="col-md-4">
		            <img src="/uploads/avatars/{{ $u->avatar }}" alt="{{ $u->avatar }}" />
	        	</div>

	        	<div class="col-md-8">
		            <h2>
		                {{ $u->name }}
		            </h2>

		            @if ($u->isactive)
					<label class="label label-success"><i class="fa fa-heart" aria-hidden="true"></i>online</label>
					@else
					<label class="label label-danger"><i class="fa fa-heart-o" aria-hidden="true"></i>offline</label>
					@endif
					<p>last time login: {{ $u->updated_at }}</p>
	        	</div>
	        </div>
			
			<div class="col-md-12">
				<div class="list-group">
					  @foreach($questions as $question)
						<a href="/questions/{{ $question->id }}" class="list-group-item">
						  <h3 class="list-group-item-heading" id="question-title">{{ $question->title }}</h3>
						  <p class="list-group-item-text">
						  	  <i class="fa fa-tag" aria-hidden="true"></i>
						  	  @foreach ($question->tags as $tag)
						  		  <span>{{ $tag->name }}</span>
						  	  @endforeach
						  </p>
						</a>
					  @endforeach
				 </div>
			</div>
				<nav>
				  <ul class="pager">
				    <li class="previous"><a href="{{ $questions->previousPageUrl() }}">&larr; Newer</a></li>
				    <li class="next"><a href="{{ $questions->nextPageUrl() }}">Older &rarr;</a></li>
				  </ul>
				</nav>
			</div>

        @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		var titles = $("h3#question-title");
		for (var i = 0; i < titles.length; i++) {
			var content = $(titles[i]).html();
			if (content.length > 20) {
				content = content.substring(0, 10) + "...";
			}
			$(titles[i]).html(content);
		}
	});
</script>
@endsection
