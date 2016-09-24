@extends('admin/default.app')

@section('title','Backend')

@section('content')
<div class="container">
  <div class="row">
	<div class="col-md-10 col-md-offset-1">
	  <div class="panel panel-default">
		<div class="panel-heading">Article management</div>

		<div class="panel-body">
		  <table class="table table-hover table-top">
					   <tr>
						   <th>#</th>
						   <th>title</th>
						   <th>author</th>
					                <th>readtimes</th>
					                <th>love | unLove</th>
						   <th>created_at</th>
						   <th class="text-right">operation</th>
					   </tr>

					   @foreach($articles as $v)
					   <tr>
						   <th scope="row">{{ $v->id }}</th>
						   <td><a href="{{ url('admin/articles',$v->id) }}">{{ $v->title }}</a></td>
						   <td>{{ $v->username }}</td>
					                 <td>{{ $v->readtimes }}</td>
					                 <td>{{ $v->love }} | {{ $v->unLove }}</td>
						   <td>{{ $v->created_at }}</td>
						   <td class="text-right">


							 <form action="{{ URL('admin/articles/'.$v->id) }}" method="POST" style="display: inline;">
							   <input name="_method" type="hidden" value="DELETE">
							   <input type="hidden" name="_token" value="{{ csrf_token() }}">
							   <button type="submit" class="btn btn-danger">Delete</button>
							 </form>
							 <a href="{{ URL('admin/articles/'.$v->id.'/edit') }}" class="btn btn-success">Edit</a>

						   </td>

					   </tr>
					   @endforeach
				   </table>
		  <hr>
		  {!! $articles->render() !!}
		</div>
	  </div>
	</div>
  </div>
</div>
@endsection
