<!-- Nav tabs -->
<ul class="nav nav-pills" role="tablist">
  <li role="presentation" class="active"><a href="#Readtimes" role="tab" data-toggle="tab">Readtimes</a></li>
  <li role="presentation"><a href="#Love" role="tab" data-toggle="tab">Love</a></li>
  <li role="presentation"><a href="#Update" role="tab" data-toggle="tab">Recently Update</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="Readtimes">
	<div class="table-responsive">
	  <table class="table table-bordered">
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th>Readtimes</th>
		</tr>
		@foreach($readered as $reader)
		<tr>
			<td>{{ $reader->title }}</td>
			<td>{{ $reader->username }}</td>
			<td>{{ $reader->readtimes}}</td>
		</tr>
		@endforeach
	  </table>
	</div>
  </div>

  <div role="tabpanel" class="tab-pane" id="Love">
	<div class="table-responsive">
	  <table class="table table-bordered">
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th>Lovetimes</th>
		</tr>
		@foreach($loved as $love)
		<tr>
			<td>{{ $love->title }}</td>
			<td>{{ $love->username }}</td>
			<td>{{ $love->love}}</td>
		</tr>
		@endforeach
	  </table>
	</div>
  </div>

  <div role="tabpanel" class="tab-pane" id="Update">
	<div class="table-responsive">
	  <table class="table table-bordered">
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th>Update Time</th>
		</tr>
		@foreach($updated as $update)
		<tr>
			<td>{{ $update->title }}</td>
			<td>{{ $update->username }}</td>
			<td>{{ $update->updated_at}}</td>
		</tr>
		@endforeach
	  </table>
	</div>
  </div>
</div>
