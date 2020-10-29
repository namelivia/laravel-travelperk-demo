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
            <div class="form-group">
                <label for="language">Language</label>
                <select id="language" name="language" class="form-control">
                    @foreach($languages as $language)
                        <option value="{{$language}}"
                        @if ($language === $data->preferredLanguage) selected @endif >
                        {{$language}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="locale">Locale</label>
                <input id="locale" value="{{$data->locale}}" name="locale" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" value="{{$data->title}}" name="title" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="externalId">External Id</label>
                <input id="externalId" value="{{$data->externalId}}" name="externalId" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="phoneNumbern">Phone Number</label>
                <input id="phoneNumber" value="{{count($data->phoneNumbers) ? $data->phoneNumbers[0]->value : null}}" name="phoneNumber" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    @foreach($genders as $gender)
                        <option value="{{$gender}}"
                        @if ($gender === $data->travelperkExtension->gender) selected @endif >
                        {{$gender}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth</label>
                <input id="dateOfBirth" value="{{$data->travelperkExtension->dateOfBirth}}" name="dateOfBirth" type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="travelPolicy">Travel Policy</label>
                <input id="travelPolicy" value="{{$data->travelperkExtension->travelPolicy}}" name="travelPolicy" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="costCenter">Cost Center</label>
                <input id="costCenter" value="{{$data->enterpriseExtension->costCenter}}" name="costCenter" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="manager">Manager</label>
                <input id="manager" value="{{$data->enterpriseExtension->manager->value}}" name="manager" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="emergencyContactName">Emergency Contact Name</label>
                <input id="emergencyContactName" value="{{$data->travelperkExtension->emergencyContact->name}}" name="emergencyContactName" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="emergencyContactPhone">Emergency Contact Phone</label>
                <input id="emergencyContactPhone" value="{{$data->travelperkExtension->emergencyContact->phone}}" name="emergencyContactPhone" type="text" class="form-control">
            </div>
            <input class="btn btn-primary" type="submit" value="Update"/>
        </form>
    </div>
</div>
@endsection
