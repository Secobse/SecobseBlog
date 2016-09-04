@extends('admin/default.app')

@section('title', 'Uer list')

@section('content')
<div class="container">
  <div class="row">
	<div class="col-md-10 col-md-offset-1">
	  <div class="panel panel-default">
		<div class="panel-heading">Manage users</div>

		<div class="panel-body">
		  <table class="table table-hover table-top">
					   <tr>
						   <th>#</th>
						   <th>username</th>
						   <th>e-mail</th>
						   <th>created_at</th>
               <th>isactive</th>
						   <th class="text-right">Operation</th>
					   </tr>

					   @foreach($users as $v)
					   <tr>
						   <th scope="row">{{ $v->id }}</th>
						   <td>{{ $v->name }}</td>
						   <td>{{ $v->email }}</td>
						   <td>{{ $v->created_at }}</td>
               <td>
                 @if($v->isactive == 1)
                    Online
                 @else
                    Offline
                 @endif
               </td>
						   <td class="text-right">

							 <form action="{{ URL('admin/users/'.$v->id) }}" method="POST" style="display: inline;">
							   <input name="_method" type="hidden" value="DELETE">
							   <input type="hidden" name="_token" value="{{ csrf_token() }}">
							   <button type="submit" class="btn btn-danger">Delete</button>
							 </form>
							 @if($v->isadmin == 0)
							 <a href="{{ URL('admin/users/'.$v->id.'/edit') }}" class="btn btn-success">Set to Admin</a>
							 @else
							<a href="{{ URL('admin/users/'.$v->id.'/edit') }}" class="btn btn-success">Cancel Admin</a>
							 @endif
						   </td>

					   </tr>
					   @endforeach
				   </table>
		  <hr>
			{!! $users->render() !!}
		</div>
	  </div>
	</div>
  </div>
</div>
@endsection
