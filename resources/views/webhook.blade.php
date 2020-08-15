@extends('layouts.layout')

@section('title')
Webhook {{ $data->id }}
@endsection

@section('content')
    Id: {{ $data->id }}<br />
    Name: {{ $data->name }}<br />
    Url: {{ $data->url }}<br />
    Secret: {{ $data->secret }}<br />
    Enabled: {{ $data->enabled ? 'Yes' : 'No' }}<br />
    Events: {{ implode($data->events) }}<br />
    Successfully Sent: {{ $data->successfully_sent }}<br />
    Failed Sent: {{ $data->failed_sent }}<br />
    Error Rate: {{ $data->error_rate }}<br />
@endsection
