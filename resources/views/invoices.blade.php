@extends('layouts.layout')

@section('title')
Invoices
@endsection

@section('content')
@include('layouts.filtering', $filteringFields)
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
@include('layouts.pagination')
@endsection
