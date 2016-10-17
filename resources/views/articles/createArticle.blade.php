@extends('layouts.app')

@section('title', '| Create your new article')

@section('css')
	<link href="/css/simplemde.min.css" rel="stylesheet">
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2 create-article">
			<form action="/articles" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title" class="col-md-2 control-label">Title</label>
					<div class="col-md-4">
						<div class="input-group">
							<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"
							       autofocus>
							@if ($errors->has('title'))
								<span class="help-block">
						        <strong>{{ $errors->first('title') }}</strong>
						    </span>
							@endif
							<span class="input-group-btn">
			            	<button type="submit" class="btn btn-primary">Submit</button>
			            </span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tags" class="col-md-2 control-label">Tags</label>
					<div class="col-md-4">
						<select class="form-control" multiple="multiple" name="tags[]">
							@foreach($tags as $tag)
								<option value="{{ $tag->id }}">{{$tag->name}}</option>
							@endforeach
						</select>
						@if ($errors->has('tags'))
							<div class="alert alert-danger">
								<strong>{{ $errors->first('tags') }}</strong>
							</div>
						@endif
					</div>
				</div>
				<div class="form-group">
					<textarea name="mdContent" id="ID"></textarea>
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
			tags: 'true',
			maximumSelectionLength: 5,
			placeholder: "Select tags",
			theme: "bootstrap"
		});
	</script>
	<script>
		var simplemde = new SimpleMDE({
			element: $("#ID")[0]
		});
	</script>


@endsection
