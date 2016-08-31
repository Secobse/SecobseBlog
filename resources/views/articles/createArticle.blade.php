@extends('layouts.app')

@section('title', '| Create your new article')

@section('css')
<link href="/css/simplemde.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form action="/articles" method="POST" class="form-horizontal">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title" class="col-md-2 control-label">Title</label>
				<div class="col-md-4">
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>
					@if ($errors->has('title'))
					    <span class="help-block">
					        <strong>{{ $errors->first('title') }}</strong>
					    </span>
					@endif
                    <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
var simplemde = new SimpleMDE({ element: $("#ID")[0] });
simplemde.value("Begin Create!");
</script>
@endsection