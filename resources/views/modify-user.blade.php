@extends('layouts.layout')

@section('title')
Update User
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <form method="POST" action="/users/{{$data->id}}/modify">
            @csrf
            <div class="form-group">
                <label for="userName">Username</label>
                <input id="userName" value="{{$data->userName}}" name="userName" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="givenName">Given Name</label>
                <input id="givenName" value="{{$data->name->givenName}}" name="givenName" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="familyName">Family Name</label>
                <input id="familyName" value="{{$data->name->familyName}}" name="familyName" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="middleName">Middle Name</label>
                <input id="middleName" value="{{$data->name->middleName}}" name="middleName" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="honorificPrefix">Honorific Prefix</label>
                <input id="honorificPrefix" value="{{$data->name->honorificPrefix}} "name="honorificPrefix" type="text" class="form-control">
            </div>
            <input class="btn btn-primary" type="submit" value="Update"/>
        </form>
    </div>
</div>
@endsection
