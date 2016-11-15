@extends('layouts.app')

@section('title', 'Home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/other/home.css') }}">
@endsection('css')

@section('content')
<div class="container">
    <div class="row">
      @if(Session::has('status'))
  				<div class="alert alert-success">
  						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
  						{{ Session::get('status') }}
  				</div>
  		@endif
        <div class="col-md-12 dashboard">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Dashboard
                </div>
                
                <div class="row detail-info">
                  <div class="col-md-4">
                    
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        Info
                      </div>
                      <div class="panel-body">
                          <form class="form" action="/profile" method="POST" enctype="multipart/form-data">
                              @foreach($user as $u)
                              <img class="userImage" src="/uploads/avatars/{{ $u->avatar }}" alt="{{ $u->avatar }}"/>
                              @endforeach
                              <div class="avatarButtons">
                                <label class="btn btn-sm btn-success btn-file">+ Update Avatar <input type="file" name="avatar"></label>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                              </div>
                          </form>
                          <hr>
                          <h5>
                            Total Question:
                            <label for="count" class="label label-info">
                              {{ $questionCount }}
                            </label>
                          </h5>
                      </div>
                  </div>

                  </div>

                  <div class="col-md-4">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            My Question
                            <span><a href="/questions/create"><button class="btn btn-sm btn-success">Ask a question</button></a></span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                @foreach($userQuestions as $userQuestion)
                                <li class="list-group-item">
                                    <span class="badge" style="background-color: white;">
                                        <a href="#" class="pull-right deleteQuestion"
                                          data-id="{{ $userQuestion->id }}">
                                            <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <a href="/questions/{{ $userQuestion->id }}/edit" class="pull-right"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
                                    </span>
                                    <a href="/questions/{{ $userQuestion->id }}">{{ $userQuestion->title }}</a>
                                </li>
                                @endforeach
                                <nav>
                                  <ul class="pager">
                                    <li class="previous"><a href="{{ $userQuestions->previousPageUrl() }}">&larr; Newer</a></li>
                                    <li class="next"><a href="{{ $userQuestions->nextPageUrl() }}">Older &rarr;</a></li>
                                  </ul>
                                </nav>
                            </ul>
                        </div>
                    </div>

                  </div>

                  <div class="col-md-4">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">My Tags</div>
                        <div class="panel-body">
                            @if($tags->isEmpty())
                                You don't hava tags!
                                @else
                                <div>Tags: <i class="fa fa-tags" aria-hidden="true"></i>
                                    @foreach($tags as $tag)
                                        <a href="{{url('tag/'.$tag->id.'')}}">{{ $tag->name }}&nbsp;</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                  </div>
                </div>

                <div class="panel-footer dashboard-footer">
                  The last time login: {{ Auth::user()->updated_at }}
                  <span>
                    <i class="fa fa-pencil" aria-hidden="true"></i>: edit your question
                    <i class="fa fa-trash" aria-hidden="true"></i>: delete your question&nbsp;&nbsp;
                  </span>
                </div>
            </div>
        </div>
  </div> 
</div>
@endsection

@section('js')
<script>
  $(document).ready(function() {
    $(".deleteQuestion").click(function() {
        var id = $(this).data("id");
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: "/questions/" + id,
          type: "DELETE",
        }).done(function() {
          self.closest("li").remove();
        });
    });
  });
</script>
@endsection
