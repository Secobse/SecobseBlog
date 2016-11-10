@extends('layouts.app')

@section('title', '| Ask your new question')

@section('css')
	<link href="/css/simplemde.min.css" rel="stylesheet">
	<link href="/css/select2.min.css" rel="stylesheet" />
	<link href="/css/select2-bootstrap.min.css" rel="stylesheet" />
@endsection

@section('content')
	<div class="row" style="margin-top: 200px;">
		<div class="col-md-8 col-md-offset-2 create-question">
			<form action="/questions" method="POST" class="form-horizontal">
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
					<div class="col-md-4" >
						<select class="form-control" multiple="multiple" name="tags[]" id="task-list">
							@foreach($tags as $id=>$name)
								<option id="tag" value="{{ $id }}">{{$name}}</option>
							@endforeach
						</select>
						@if ($errors->has('tags'))
							<div class="alert alert-danger">
								<strong>{{ $errors->first('tags') }}</strong>
							</div>
						@endif
					</div>
						<button type="button" class="btn btn-primary" id="add">添加标签</button>
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
		<div id="debug"></div>
	</div>

	{{--Modal--}}
	@include('tags.createtag')
@endsection

@section('js')
	<script src="/js/simplemde.min.js"></script>
	<script src="/js/select2.min.js"></script>
	<link href="http://cdn.bootcss.com/toastr.js/2.1.3/toastr.min.css" rel="stylesheet">
	<script src="http://cdn.bootcss.com/toastr.js/2.1.3/toastr.min.js"></script>
	<script src="{{ asset('js/tag.js') }}"></script>
	<script type="text/javascript">
		$("select").select2({
			tokenSeparators: [",", " "],
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
