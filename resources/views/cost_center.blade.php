@extends('layouts.layout')

@section('title')
Cost center {{ $data->id}}
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
     	<dl class="row">
  			<dt class="col-sm-3">Id</dt>
  			<dd class="col-sm-9">{{$data->id}}</dd>
  			<dt class="col-sm-3">Name</dt>
  			<dd class="col-sm-9">{{$data->name}}</dd>
  			<dt class="col-sm-3">Archived</dt>
  			<dd class="col-sm-9">{{$data->archived ? 'Yes' : 'No'}}</dd>
  			<dt class="col-sm-3">User count</dt>
  			<dd class="col-sm-9">{{$data->countUsers}}</dd>
		</dl>
        <h5>Users</h5>
        <table class="table table-sm table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Phone</th>
                    <th>Profile picture</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data->users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstName }}</td>
                    <td>{{ $user->lastName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->profilePicture }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
