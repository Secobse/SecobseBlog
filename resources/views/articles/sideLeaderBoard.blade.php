<div style="margin-top: -15px;">

<div class="offer offer-radius offer-success">
	<div class="shape">
		<div class="shape-text">
			top
		</div>
	</div>
	<div class="offer-content">
		<h3 class="lead">
			Readtimes
		</h3>
		<div class="table-responsive">
		  <table class="table">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Readtimes</th>
			</tr>
			@foreach($readered as $reader)
			<tr>
				<td><a href="/articles/{{ $reader->id }}">{{ $reader->title }}</a></td>
				<td><a href="/profile/{{ $reader->username }}">{{ $reader->username }}</a></td>
				<td>{{ $reader->readtimes}}</td>
			</tr>
			@endforeach
		  </table>
		</div>
	</div>
</div>

<div class="offer offer-radius offer-danger">
	<div class="shape">
		<div class="shape-text">
			top
		</div>
	</div>
	<div class="offer-content">
		<h3 class="lead">
			Lovetimes
		</h3>
		<div class="table-responsive">
		  <table class="table">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Lovetimes</th>
			</tr>
			@foreach($loved as $love)
			<tr>
				<td><a href="/articles/{{ $love->id }}">{{ $love->title }}</a></td>
				<td><a href="/profile/{{ $love->username }}">{{ $love->username }}</a></td>
				<td>{{ $love->love}}</td>
			</tr>
			@endforeach
		  </table>
		</div>
	</div>
</div>

<div class="offer offer-radius offer-info">
	<div class="shape">
		<div class="shape-text">
			top
		</div>
	</div>
	<div class="offer-content">
		<h3 class="lead">
			Last Update
		</h3>
		<div class="table-responsive">
		  <table class="table">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Update Time</th>
			</tr>
			@foreach($updated as $update)
			<tr>
				<td><a href="/articles/{{ $update->id }}">{{ $update->title }}</a></td>
				<td><a href="/profile/{{ $update->username }}">{{ $update->username }}</a></td>
				<td>{{ $update->updated_at}}</td>
			</tr>
			@endforeach
		  </table>
		</div>
	</div>
</div>
</div>