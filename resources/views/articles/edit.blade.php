@extends('layouts.app')

@section('title', '| Edit your article')

@section('css')
	<link href="/css/simplemde.min.css" rel="stylesheet">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="{{ route('articles.update', $article->id) }}" method="POST" class="form-horizontal">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title" class="col-md-2 control-label">Title</label>
					<div class="col-md-4">
						<div class="input-group">
							<input id="title" type="text" class="form-control" name="title"
							       value="{{ $article->title }}" disabled>
							@if ($errors->has('title'))
								<span class="help-block">
						        <strong>{{ $errors->first('title') }}</strong>
						    </span>
							@endif
							<span class="input-group-btn">
			            	<button type="submit" class="btn btn-primary">Save</button>
			            </span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tags" class="col-md-2 control-label">Tags</label>
					<div class="col-md-4">
						<select class="form-control" multiple="multiple" name="tags[]">
							@foreach($article->tags as $tag)
								<option value="{{ $tag->id }}" selected="selected">{{$tag->name}}</option>
							@endforeach
							@foreach($tags as $tag)
								<option value="{{$tag->id}}">{{$tag->name}}</option>
							@endforeach
						</select>
						@if ($errors->has('tags'))
							<span class="help-block">
						        <strong>{{ $errors->first('tags') }}</strong>
						    </span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<textarea name="mdContent" id="ID">{{ $article->content }}</textarea>
					@if ($errors->has('mdContent'))
						<span class="help-block">
				        <strong>{{ $errors->first('mdContent') }}</strong>
				    </span>
					@endif
				</div>
			</form>
		</div>
	</div>
@endsection

@section('js')
	<script src="/js/simplemde.min.js"></script>
	<script src="/js/select2.min.js"></script>
	<script type="text/javascript">
		$("select").select2({
			tags: "true",
			maximumSelectionLength: 5,
			theme: "bootstrap"
		});
	</script>
	<script>
		var simplemde = new SimpleMDE({
			element: $("#ID")[0]
		});
	</script>
@endsection