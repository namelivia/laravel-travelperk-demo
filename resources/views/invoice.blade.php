@extends('layouts.layout')

@section('title')
Invoice {{ $data->serial_number }}
@endsection

@section('content')
    Serial Number: {{ $data->serial_number }}<br />
    Profile Id: {{ $data->profile_id }}<br />
    Profile Name: {{ $data->profile_name }}<br />
    Mode: {{ $data->mode }}<br />
    Status: {{ $data->status }}<br />
    Issuing date: {{ $data->issuing_date }}<br />
    Billing period: {{ $data->billing_period }}<br />
    From date: {{ $data->from_date }}<br />
    To date: {{ $data->to_date }}<br />
    Due date: {{ $data->due_date }}<br />
    Currency: {{ $data->currency }}<br />
    Total: {{ $data->total }}<br />
    Reference: {{ $data->reference }}<br />
    PDF: <a href="{{ $data->pdf }}">{{$data->serial_number}}</a><br />
@endsection
