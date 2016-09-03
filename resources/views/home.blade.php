@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard<a href="{{ url('/articles/create') }}">
                </div>

                <div class="panel-body">
                    <button class="btn btn-sm btn-success">Create A Blog</button></a>
                    <hr />
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        <label for="update">Update Profile Image</label>
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
                <div class="panel-heading">My Article</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($userArticles as $userArticle)
                        <li class="list-group-item">
                            <a href="{{ route('articles.destroy', $userArticle->id) }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('delete-form').submit();" class="pull-right">
                                       <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="/articles/{{ $userArticle->id }}/edit" class="pull-right"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            {{ $userArticle->title }}
                        </li>
                        <form id="delete-form" action="/articles/{{ $userArticle->id }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
