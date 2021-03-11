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
        </tr>
    </thead>
    <tbody>
        @foreach($response->users as $user)
        <tr>
            <td>{{ $user->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.pagination')
@endsection
