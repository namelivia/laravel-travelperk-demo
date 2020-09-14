@extends('layouts.layout')

@section('title')
Update User
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <form method="POST" action="/users/{{$data->id}}/modify">
            @csrf
            <h1>TODO</h1>
            <input class="btn btn-primary" type="submit" value="Update"/>
        </form>
    </div>
</div>
@endsection
