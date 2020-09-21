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
    <div class="form-group">
        <label for="middleName">Middle Name</label>
        <input id="middleName" name="middleName" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="honorificPrefix">Honorific Prefix</label>
        <input id="honorificPrefix" name="honorificPrefix" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="language">Language</label>
        <select id="language" name="language" class="form-control">
            @foreach($languages as $language)
                <option value="{{$language}}">{{$language}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="locale">Locale</label>
        <input id="locale" name="locale" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="externalId">External Id</label>
        <input id="externalId" name="externalId" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="phoneNumbern">Phone Number</label>
        <input id="phoneNumber" name="phoneNumber" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" class="form-control">
            @foreach($genders as $gender)
                <option value="{{$gender}}">{{$gender}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="dateOfBirth">Date of Birth</label>
        <input id="dateOfBirth" name="dateOfBirth" type="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="travelPolicy">Travel Policy</label>
        <input id="travelPolicy" name="travelPolicy" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="costCenter">Cost Center</label>
        <input id="costCenter" name="costCenter" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="manager">Manager</label>
        <input id="manager" name="manager" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="emergencyContactName">Emergency Contact Name</label>
        <input id="emergencyContactName" name="emergencyContactName" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="emergencyContactPhone">Emergency Contact Phone</label>
        <input id="emergencyContactPhone" name="emergencyContactPhone" type="text" class="form-control">
    </div>
    <input class="btn btn-success" type="submit" value="Create"/>
</form>
@endsection
