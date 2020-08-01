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
        @foreach($data->invoices as $invoice)
        <tr>
            <td>{{ $invoice->serial_number }}</td>
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
Total: {{ $data->total }} | Offset: {{ $data->offset }} | Limit: {{ $data->limit }}
@endsection
