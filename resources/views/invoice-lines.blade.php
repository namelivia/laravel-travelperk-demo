@extends('layouts.layout')

@section('title')
Invoices Profiles
@endsection

@section('content')
@include('layouts.filtering', $filteringFields)
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
        @foreach($response->invoiceLines as $invoiceLine)
        <tr>
            <td>{{ $invoiceLine->expenseDate }}</td>
            <td>{{ $invoiceLine->description }}</td>
            <td>{{ $invoiceLine->quantity }}</td>
            <td>{{ $invoiceLine->unitPrice }}</td>
            <td>{{ $invoiceLine->nonTaxableUnitPrice }}</td>
            <td>{{ $invoiceLine->taxPercentage }}</td>
            <td>{{ $invoiceLine->taxAmount }}</td>
            <td>{{ $invoiceLine->taxRegime }}</td>
            <td>{{ $invoiceLine->totalAmount }}</td>
            <td>
                <a href="{{route('invoice', ['serialNumber' => $invoiceLine->invoiceSerialNumber])}}">
                    {{ $invoiceLine->invoiceSerialNumber }}
                </a>
            </td>
            <td>{{ $invoiceLine->profileId }}</td>
            <td>{{ $invoiceLine->profileName }}</td>
            <td>{{ $invoiceLine->invoiceMode }}</td>
            <td>{{ $invoiceLine->invoiceStatus }}</td>
            <td>{{ $invoiceLine->issuingDate }}</td>
            <td>{{ $invoiceLine->dueDate }}</td>
            <td>{{ $invoiceLine->currency }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.pagination')
@endsection
