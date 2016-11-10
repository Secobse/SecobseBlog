@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
      @if(Session::has('status'))
  				<div class="alert alert-success">
  						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
  						{{ Session::get('status') }}
  				</div>
  		@endif
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>

                <div class="panel-body">
                    <div class="text-align">
                        <a href="/questions/create"><button class="btn btn-sm btn-success">Create A Blog</button></a>
                    </div>
                    <hr />
                    <form class="form" action="/profile" method="POST" enctype="multipart/form-data">
                        <label for="update">Update Profile Image</label>
                        @foreach($user as $u)
                        <img src="/uploads/avatars/{{ $u->avatar }}" alt="{{ $u->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" />
                        @endforeach
                            <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="Submit" class="btn btn-sm btn-primary" style="position: relative; bottom: 25px; left: 200px;">
                    </form>
                    <hr />
                </div>

                <div class="panel-footer">The last time login: {{ Auth::user()->updated_at }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">My Question</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($userQuestions as $userQuestion)
                        <li class="list-group-item">
                            <a href=""
                                        onclick="event.preventDefault();
                                                 document.getElementById('delete-form').submit();" class="pull-right">
                                       <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="/questions/{{ $userQuestion->id }}/edit" class="pull-right"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            {{ $userQuestion->title }}
                        </li>
                        <form id="delete-form" action="/questions/{{ $userQuestion->id }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        @endforeach
                        <nav>
                            {{$userQuestions->render()}}
                        </nav>
                    </ul>
                </div>
            </div>
        </div>
          <div class="col-md-6">
              <div class="panel panel-default">
                  <div class="panel-heading">My Tags</div>
                  <div class="panel-body">
                      @if($tags->isEmpty())
                          You don't hava tags!
                          @else
                          <em>Tags:<i class="glyphicon glyphicon-tags"></i>
                              @foreach($tags as $tag)
                                  <a href="{{url('tag/'.$tag->id.'')}}">{{ $tag->name }}&nbsp;</a>
                              @endforeach
                          </em>
                      @endif
                  </div>
              </div>
          </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
		$('div.alert').not('.alert-important').delay(3000).slideUp(500);
</script>
@endsection
