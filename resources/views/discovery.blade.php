@extends('layouts.layout')

@section('title')
Discovery
@endsection

@section('content')
<h2>Service Provider Config</h2>
<pre>{{json_encode($serviceProviderConfig, JSON_PRETTY_PRINT)}}</pre>

<h2>Resource Types</h2>
<pre>{{json_encode($resourceTypes, JSON_PRETTY_PRINT)}}</pre>

<h2>Schemas</h2>
<pre>{{json_encode($schemas, JSON_PRETTY_PRINT)}}</pre>

<h2>userSchema</h2>
<pre>{{json_encode($userSchema, JSON_PRETTY_PRINT)}}</pre>

<h2>enterpriseUserSchema</h2>
<pre>{{json_encode($enterpriseUserSchema, JSON_PRETTY_PRINT)}}</pre>
@endsection
