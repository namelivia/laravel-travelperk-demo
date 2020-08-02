@extends('layouts.layout')

@section('title')
Invoices
@endsection

@section('content')
<form method="GET" action="/invoices">
    <label for="offset">Offset</label>
    <input id="offset" name="offset" type="number" value="{{ $response->offset}}">
    <label for="limit">Limit</label>
    <input id="limit" name="limit" type="number" value="{{ $response->limit }}">
    <label for="account_number">TravelPerk Bank Account Number</label>
    <input id="account_number" name="account_number" type="text" value="{{ $account_number }}">
    <input type="submit" value="Apply"/>
</form>
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
@endsection
