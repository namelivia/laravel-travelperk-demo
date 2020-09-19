@extends('layouts.layout')

@section('title')
Create User
@endsection

@section('content')
<form method="POST" action="/users/create">
    @csrf
    <div class="form-group">
        <label for="userName">Username</label>
        <input id="userName" name="userName" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="givenName">Given Name</label>
        <input id="givenName" name="givenName" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="familyName">Family Name</label>
        <input id="familyName" name="familyName" type="text" class="form-control">
    </div>
    <input class="btn btn-success" type="submit" value="Create"/>
</form>
@endsection
