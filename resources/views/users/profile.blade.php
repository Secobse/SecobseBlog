@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="/uploads/avatars/@foreach($user as $u){{ $u->avatar }}@endforeach" alt="@foreach($user as $u){{ $u->avatar }}@endforeach" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" />
            <h2>
                @foreach($user as $u){{ $u->name }}@endforeach 's Profile
            </h2>
        </div>
    </div>
</div>
@endsection
