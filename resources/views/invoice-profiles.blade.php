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
<nav aria-label="Pagination">
  <ul class="pagination">
    <li class="page-item {{ $response->offset == 0 ? 'disabled' : ''}}">
        <a class="page-link" href="?page={{($response->offset / $response->limit) - 1}}">Previous</a>
    </li>
    @foreach (range(0, ($response->total/$response->limit)) as $page)
        <li class="page-item {{ $loop->index == ($response->offset / $response->limit) ? 'active' : ''}}">
            <a class="page-link" href="?page={{$page}}">{{$page}}</a>
        </li>
    @endforeach
    <li class="page-item {{ $response->offset + $response->limit > $response->total ? 'disabled' : ''}}">
        <a class="page-link" href="?page={{$response->offset + 1}}">
            Next
        </a>
    </li>
  </ul>
</nav>
Total: {{ $response->total }} | Offset: {{ $response->offset }} | PageSize: {{ $response->limit }}
@endsection
