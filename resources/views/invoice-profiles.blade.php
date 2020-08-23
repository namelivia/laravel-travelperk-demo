@extends('layouts.layout')

@section('title')
Invoices Profiles
@endsection

@section('content')
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Payment method type</th>
            <th>Billing period</th>
            <th>Currency</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->profiles as $profile)
        <tr>
            <td>{{ $profile->id }}</td>
            <td>{{ $profile->name }}</td>
            <td>{{ $profile->payment_method_type }}</td>
            <td>{{ $profile->billing_period }}</td>
            <td>{{ $profile->currency }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.pagination')
@endsection
