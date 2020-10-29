@extends('layouts.layout')

@section('title')
Webdhooks
@endsection

@section('content')
<div class="mb-2 text-right">
    <a class="btn btn-primary" href="{{route('create-webhook')}}">New Webhook</a>
</div>
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Enabled</th>
            <th>Name</th>
            <th>URL</th>
            <th>Events</th>
            <th>Sucessfully sent</th>
            <th>Failed sent</th>
            <th>Error rate</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->webhooks as $webhook)
        <tr>
            <td>{{ $webhook->enabled ? 'Yes' : 'No'}}</td>
            <td>
                <a href="{{route('webhook', ['id' => $webhook->id])}}">
                    {{ $webhook->name }}
                </a>
            </td>
            <td>{{ $webhook->url }}</td>
            <td>{{ implode($webhook->events) }}</td>
            <td>{{ $webhook->successfullySent }}</td>
            <td>{{ $webhook->failedSent }}</td>
            <td>{{ $webhook->errorRate }}</td>
            <td>
                <div class="btn-group" role="group">
                    <a href="{{route('modify-webhook', ['id' => $webhook->id])}}">
                        <button class="btn btn-primary">Update</button>
                    </a>
                    <form method="POST" action="/webhooks/{{$webhook->id}}">
                        @csrf
                        {{ method_field('DELETE') }}

                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<h2>Events</h2>
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Topic</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{ $event->name }}</td>
            <td>{{ $event->topic }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
