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
        </tr>
    </thead>
    <tbody>
        @foreach($response->trips as $trip)
        <tr>
            <td>{{ $trip->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.pagination')
@endsection
