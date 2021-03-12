@extends('layouts.layout')

@section('title')
Bookings
@endsection

@section('content')
@include('layouts.filtering', $filteringFields)
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Start</th>
            <th>End</th>
            <th>Type</th>
            <th>Status</th>
            <th>Modified</th>
            <th>Trip Id</th>
            <th>Latitude</th>
            <th>Longitude</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->start }}</td>
            <td>{{ $booking->end }}</td>
            <td>{{ $booking->type }}</td>
            <td>{{ $booking->status }}</td>
            <td>{{ $booking->modified }}</td>
            <td>{{ $booking->tripId }}</td>
            <td>{{ $booking->location ?  $booking->location->latitude : ''}}</td>
            <td>{{ $booking->location ? $booking->location->longitude : ''}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.pagination')
@endsection
