@extends('layouts.layout')

@section('title')
Webdhooks
@endsection

@section('content')
<h2>Webhooks</h2>
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>URL</th>
            <th>Secret</th>
            <th>Enabled</th>
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
            <td>
                <a href="{{route('webhook', ['id' => $webhook->id])}}">
                    {{ $webhook->id }}
                </a>
            </td>
            <td>{{ $webhook->name }}</td>
            <td>{{ $webhook->url }}</td>
            <td>{{ $webhook->secret }}</td>
            <td>{{ $webhook->enabled ? 'Yes' : 'No'}}</td>
            <td>{{ implode($webhook->events) }}</td>
            <td>{{ $webhook->successfully_sent }}</td>
            <td>{{ $webhook->failed_sent }}</td>
            <td>{{ $webhook->error_rate }}</td>
            <td>
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
