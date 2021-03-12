@extends('layouts.layout')

@section('title')
Trips
@endsection

@section('content')
@include('layouts.filtering', $filteringFields)
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Start</th>
            <th>End</th>
            <th>Status</th>
            <th>Modified</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->trips as $trip)
        <tr>
            <td>{{ $trip->id }}</td>
            <td>{{ $trip->tripName }}</td>
            <td>{{ $trip->start }}</td>
            <td>{{ $trip->end }}</td>
            <td>{{ $trip->status }}</td>
            <td>{{ $trip->modified }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.pagination')
@endsection
