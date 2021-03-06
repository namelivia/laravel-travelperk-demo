@extends('layouts.layout')

@section('title')
User {{ $data->id }}
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
     	<dl class="row">
  			<dt class="col-sm-2">Id</dt>
  			<dd class="col-sm-4">{{$data->id}}</dd>
  			<dt class="col-sm-2">Given Name</dt>
  			<dd class="col-sm-4">{{$data->name->givenName}}</dd>
  			<dt class="col-sm-2">Family Name</dt>
  			<dd class="col-sm-4">{{$data->name->familyName}}</dd>
  			<dt class="col-sm-2">Middle Name</dt>
  			<dd class="col-sm-4">{{$data->name->middleName}}</dd>
  			<dt class="col-sm-2">Honorific prefiix</dt>
  			<dd class="col-sm-4">{{$data->name->honorificPrefix}}</dd>
  			<dt class="col-sm-2">Locale</dt>
  			<dd class="col-sm-4">{{$data->locale}}</dd>
  			<dt class="col-sm-2">Preferred Language</dt>
  			<dd class="col-sm-4">{{$data->preferredLanguage}}</dd>
  			<dt class="col-sm-2">Title</dt>
  			<dd class="col-sm-4">{{$data->title}}</dd>
  			<dt class="col-sm-2">External Id</dt>
  			<dd class="col-sm-4">{{$data->externalId}}</dd>
  			<dt class="col-sm-2">Id</dt>
  			<dd class="col-sm-4">{{$data->id}}</dd>
  			<dt class="col-sm-2">Active</dt>
  			<dd class="col-sm-4">{{$data->active ? 'Yes' : 'No'}}</dd>
  			<dt class="col-sm-2">User Name</dt>
  			<dd class="col-sm-4">{{$data->userName}}</dd>
  			<dt class="col-sm-2">Phone numbers</dt>
            <dd class="col-sm-4">{{isset($data->phoneNumbers[0]) ? $data->phoneNumbers[0]->value : ''}}</dd>
  			<dt class="col-sm-2">Resource</dt>
  			<dd class="col-sm-4">{{$data->meta->resourceType}}</dd>
  			<dt class="col-sm-2">Created</dt>
  			<dd class="col-sm-4">{{$data->meta->created}}</dd>
  			<dt class="col-sm-2">Last modified</dt>
  			<dd class="col-sm-4">{{$data->meta->lastModified}}</dd>
  			<dt class="col-sm-2">Location</dt>
  			<dd class="col-sm-4">{{$data->meta->location}}</dd>
  			<dt class="col-sm-2">Cost Center</dt>
  			<dd class="col-sm-4">{{$data->enterpriseExtension->costCenter}}</dd>
  			<dt class="col-sm-2">Manager</dt>
  			<dd class="col-sm-4">{{$data->enterpriseExtension->manager->value}}</dd>
  			<dt class="col-sm-2">Gender</dt>
  			<dd class="col-sm-4">{{$data->travelperkExtension->gender}}</dd>
  			<dt class="col-sm-2">Date of Birth</dt>
  			<dd class="col-sm-4">{{$data->travelperkExtension->dateOfBirth}}</dd>
  			<dt class="col-sm-2">Invoice profiles</dt>
            <dd class="col-sm-4">{{implode(
                array_map(function ($a) {
                    return $a->value;
                }, $data->travelperkExtension->invoiceProfiles)
            )}}</dd>
  			<dt class="col-sm-2">Emergency contact name</dt>
            <dd class="col-sm-4">{{$data->travelperkExtension->emergencyContact->name}}</dd>
  			<dt class="col-sm-2">Emergency contact phone</dt>
            <dd class="col-sm-4">{{$data->travelperkExtension->emergencyContact->phone}}</dd>
  			<dt class="col-sm-2">Travel Policy</dt>
            <dd class="col-sm-4">{{$data->travelperkExtension->travelPolicy}}</dd>
		</dl>
    </div>
</div>
@endsection
