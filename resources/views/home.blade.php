@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <a href="{{ url('/articles/create') }}"><button class="btn btn-sm btn-success">Create A Blog</button></a>
                </div>

                <form action="/profile" method="POST" enctype="multipart/form-data">
                    <label for="update">Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
