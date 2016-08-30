@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="uploads/avatars/{{ $user->avatar }}" alt="{{ $user->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" />
            <h2>{{ $user->name }}'s Profile</h2>
            <form action="/profile" method="POST" enctype="multipart/form-data">
                <label for="update">Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="Submit" class="btn btn-sm btn-primary pull-right">
            </form>
        </div>
    </div>
</div>
@endsection
