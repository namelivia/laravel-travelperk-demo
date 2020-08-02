@extends('layouts.layout')

@section('title')
Invoices Profiles
@endsection

@section('content')
@section('content')
<form method="GET" action="/invoice-lines">
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
            <th>Expense date</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Unit price</th>
            <th>Non taxable unit price</th>
            <th>Tax percentage</th>
            <th>Tax amount</th>
            <th>Tax regime</th>
            <th>Total amount</th>
            <th>Invoice serial number</th>
            <th>Profile id</th>
            <th>Profile name</th>
            <th>Invoice mode</th>
            <th>Invoice status</th>
            <th>Issuing date</th>
            <th>Due date</th>
            <th>Currency</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->invoice_lines as $invoiceLine)
        <tr>
            <td>{{ $invoiceLine->expense_date }}</td>
            <td>{{ $invoiceLine->description }}</td>
            <td>{{ $invoiceLine->quantity }}</td>
            <td>{{ $invoiceLine->unit_price }}</td>
            <td>{{ $invoiceLine->non_taxable_unit_price }}</td>
            <td>{{ $invoiceLine->tax_percentage }}</td>
            <td>{{ $invoiceLine->tax_amount }}</td>
            <td>{{ $invoiceLine->tax_regime }}</td>
            <td>{{ $invoiceLine->total_amount }}</td>
            <td>
                <a href="{{route('invoice', ['serialNumber' => $invoiceLine->invoice_serial_number])}}">
                    {{ $invoiceLine->invoice_serial_number }}
                </a>
            </td>
            <td>{{ $invoiceLine->profile_id }}</td>
            <td>{{ $invoiceLine->profile_name }}</td>
            <td>{{ $invoiceLine->invoice_mode }}</td>
            <td>{{ $invoiceLine->invoice_status }}</td>
            <td>{{ $invoiceLine->issuing_date }}</td>
            <td>{{ $invoiceLine->due_date }}</td>
            <td>{{ $invoiceLine->currency }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
Total: {{ $response->total }} | Offset: {{ $response->offset }} | Limit: {{ $response->limit }}
@endsection
