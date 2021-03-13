@extends('layouts.layout')

@section('title')
Costs Centers
@endsection

@section('content')
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Users Count</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->costCenters as $costCenter)
        <tr>
            <td>
                <a href="{{route('cost-center', ['id' => $costCenter->id])}}">
                    {{ $costCenter->id }}
                </a>
            </td>
            <td>{{ $costCenter->name }}</td>
            <td>{{ $costCenter->countUsers }}</td>
            <td>
                <div class="btn-group" role="group">
                    <a href="{{route('modify-cost-center', ['id' => $costCenter->id])}}">
                        <button class="btn btn-primary">Update</button>
                    </a>
                    <a href="{{route('modify-users', ['id' => $costCenter->id])}}">
                        <button class="btn btn-primary">Set Users</button>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.pagination')
@endsection
