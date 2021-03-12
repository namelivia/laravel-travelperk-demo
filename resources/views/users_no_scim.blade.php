@extends('layouts.layout')

@section('title')
Users (No SCIM)
@endsection

@section('content')
@include('layouts.filtering', $filteringFields)
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Name</th>
            <th>Job Title</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->userName }}</td>
            <td>{{ $user->name->firstName}} {{$user->name->lastName }}</td>
            <td>{{ $user->jobTitle }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.pagination')
@endsection
