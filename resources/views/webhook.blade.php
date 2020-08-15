@extends('layouts.layout')

@section('title')
Webhook {{ $data->id }}
@endsection

@section('content')
    Id: {{ $data->id }}<br />
@endsection
