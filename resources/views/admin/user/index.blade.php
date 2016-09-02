@extends('admin/default.app')

@section('title', 'Uer list')

@section('content')
<div class="container">
  <div class="row">
	<div class="col-md-10 col-md-offset-1">
	  <div class="panel panel-default">
		<div class="panel-heading">管理用户</div>

		<div class="panel-body">
		  <table class="table table-hover table-top">
					   <tr>
						   <th>#</th>
						   <th>姓名</th>
						   <th>邮箱</th>
						   <th>创建时间</th>
						   <th class="text-right">操作</th>
					   </tr>

					   @foreach($users as $k=> $v)
					   <tr>
						   <th scope="row">{{ $v->id }}</th>
						   <td>{{ $v->name }}</td>
						   <td>{{ $v->email }}</td>
						   <td>{{ $v->created_at }}</td>
						   <td class="text-right">

							 <form action="{{ URL('admin/users/'.$v->id) }}" method="POST" style="display: inline;">
							   <input name="_method" type="hidden" value="DELETE">
							   <input type="hidden" name="_token" value="{{ csrf_token() }}">
							   <button type="submit" class="btn btn-danger">删除</button>
							 </form>
							 @if($v->isadmin ==0)
							 <a href="{{ URL('admin/users/'.$v->id.'/edit') }}" class="btn btn-success">设为管理员</a>
							 @else
							<a href="{{ URL('admin/users/'.$v->id.'/edit') }}" class="btn btn-success">取消管理员</a>
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
