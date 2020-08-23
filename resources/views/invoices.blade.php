@extends('layouts.layout')

@section('title')
Invoices
@endsection

@section('content')
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Serial number</th>
            <th>Profile id</th>
            <th>Profile name</th>
            <th>Mode</th>
            <th>Status</th>
            <th>Total</th>
            <th>Currency</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->invoices as $invoice)
        <tr>
            <td>
                <a href="{{route('invoice', ['serialNumber' => $invoice->serial_number])}}">
                    {{ $invoice->serial_number }}
                </a>
            </td>
            <td>{{ $invoice->profile_id }}</td>
            <td>{{ $invoice->profile_name}}</td>
            <td>{{ $invoice->mode }}</td>
            <td>{{ $invoice->status }}</td>
            <td>{{ $invoice->total }}</td>
            <td>{{ $invoice->currency }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
Total: {{ $response->total }} | Page: {{ $response->offset }} | PageSize: {{ $response->limit }}
<nav aria-label="Pagination">
  <ul class="pagination">
    <li class="page-item {{ $response->offset == 0 ? 'disabled' : ''}}">
        <a class="page-link" href="?page={{$response->offset - 1}}">Previous</a>
    </li>
    @foreach (range(0, ($response->total/$response->limit)) as $page)
        <li class="page-item {{ $loop->index == $response->offset ? 'active' : ''}}">
            <a class="page-link" href="?page={{$page}}">{{$page + 1}}</a>
        </li>
    @endforeach
    <li class="page-item"><a class="page-link" href="?page={{$response->offset + 1}}">Next</a></li>
  </ul>
</nav>
@endsection
