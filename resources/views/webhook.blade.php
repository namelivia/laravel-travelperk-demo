@extends('layouts.layout')

@section('title')
Webhook {{ $data->id }}
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
     	<dl class="row">
  			<dt class="col-sm-3">Id</dt>
  			<dd class="col-sm-9">{{$data->id}}</dd>
  			<dt class="col-sm-3">Name</dt>
  			<dd class="col-sm-9">{{$data->name}}</dd>
  			<dt class="col-sm-3">URL</dt>
  			<dd class="col-sm-9"><a href="{{$data->url}}">{{$data->url}}</a></dd>
  			<dt class="col-sm-3">Secret</dt>
  			<dd class="col-sm-9">{{$data->secret}}</dd>
  			<dt class="col-sm-3">Enabled</dt>
  			<dd class="col-sm-9">{{$data->enabled? 'Yes' : 'No'}}</dd>
  			<dt class="col-sm-3">Events</dt>
  			<dd class="col-sm-9">{{implode($data->events)}}</dd>
  			<dt class="col-sm-3">Sucessfully Sent</dt>
  			<dd class="col-sm-9">{{$data->successfully_sent}}</dd>
  			<dt class="col-sm-3">Failed Sent</dt>
  			<dd class="col-sm-9">{{$data->failed_sent}}</dd>
  			<dt class="col-sm-3">Error Rate</dt>
  			<dd class="col-sm-9">{{$data->error_rate}}</dd>
		</dl>
        <form method="POST" action="/webhooks/{{$data->id}}/test">
            @csrf
            <input class="btn btn-success" type="submit" value="Test"/>
        </form>
    </div>
</div>
@endsection
