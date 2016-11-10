<script>
	function reply() {
		var username = document.getElementById('username').getAttribute('data');
//				var textArea = document.getElementById('comment');
		//textArea.innerHTML = '@'+username+' ';
		$('#comment').attr('value', '@'+username+'');
	}
</script>
@foreach($answer as $as)
	<div id="answer_list">
		<h4 id="answer_content">@MarkDown($as->html_content)</h4>
		<img src="/uploads/avatars/{{ $as->avatar}}" alt="{{ $as->avatar}}" width="32px" height="32px"/>
		<div id="answer_name"><a href="/profile/{{ $as->answer_name }}">{{$as->answer_name}}</a></div>
		<div>{{ $as->created_at }}回答</div>
		<div>评论{{$as->comments->count('id')}}
			@foreach($as->comments as $co)
				<div id="username" data="{{$co->username}}">@MarkDown($co->html_content) --{{ $co->username }} : {{$co->created_at->diffForHumans()}} <div class="reply">
						<a href="#new" onclick="reply(this);">回复</a>
					</div></div>
			@endforeach
			<form action="{{ route('comment.store') }}" method="post" class="form-horizontal">
				{{ csrf_field() }}
				<input type="hidden" name="commentable_id" value="{{ $as->id }}">
				<input type="hidden" name="id" value="{{$question->id}}">
				<input type="hidden" name="commentable_type" value="App\Answer">
				{{--<input type="text" id="comment" name="content"  required>--}}
				<textarea name="content" id="comment" cols="30" rows="10" placeholder="填写评论" required></textarea>
				<button type="submit" class="btn btn-default">Comment</button>
			</form>
		</div>
		<hr>
	</div>
@endforeach