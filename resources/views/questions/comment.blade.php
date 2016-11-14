@foreach($answer as $as)
	<div id="answer_list">
		<h4 id="answer_content">@MarkDown($as->html_content)</h4>
		<img src="/uploads/avatars/{{ $as->avatar}}" alt="{{ $as->avatar}}" width="32px" height="32px"/>
		<div id="answer_name"><a href="/profile/{{ $as->answer_name }}">{{$as->answer_name}}</a></div>
		<div>{{ $as->created_at }}answer</div>
		<hr>
		@foreach($as->comments as $co)
			<div>
				<div>@MarkDown($co->html_content) <span>--{{ $co->username }}</span>
					<span>♦{{$co->created_at->diffForHumans()}}</span></div>
			</div>
		@endforeach
		<div class="comment">
			<div class="comments">add a comment(Total comments:{{$as->comments->count('id')}})</div>
			<div class="addComment" style="display: none">
				<form action="{{ route('comment.store') }}" method="post" class="form-horizontal">
					{{ csrf_field() }}
					<input type="hidden" name="commentable_id" value="{{ $as->id }}">
					<input type="hidden" name="id" value="{{$question->id}}">
					<input type="hidden" name="commentable_type" value="App\Answer">
					<textarea name="content" placeholder="填写评论" required></textarea>
					<button type="submit" class="btn btn-default">Comment</button>
				</form>
			</div>
		</div>
		<hr>
	</div>
@endforeach