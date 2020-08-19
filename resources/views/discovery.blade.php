@extends('layouts.layout')

@section('title')
Discovery
@endsection

@section('content')
<h2>Service Provider Config</h2>
<pre><code>{{json_encode($serviceProviderConfig, JSON_PRETTY_PRINT)}}</code></pre>

<h2>Resource Types</h2>
<pre><code>{{json_encode($resourceTypes, JSON_PRETTY_PRINT)}}</code></pre>

<h2>Schemas</h2>
<pre><code>{{json_encode($schemas, JSON_PRETTY_PRINT)}}</code></pre>

<h2>userSchema</h2>
<pre><code>{{json_encode($userSchema, JSON_PRETTY_PRINT)}}</code></pre>

<h2>enterpriseUserSchema</h2>
<pre><code>{{json_encode($enterpriseUserSchema, JSON_PRETTY_PRINT)}}</code></pre>
@endsection
