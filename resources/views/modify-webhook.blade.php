@extends('layouts.layout')

@section('title')
Update Webhook
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <form method="POST" action="/webhooks/{{$data->id}}/modify">
            @csrf
            <div class="form-check">
                <input id="enabled" {{ $data->enabled ? 'checked="checked"' : '' }} value="1" name="enabled" type="checkbox" class="form-check-input">
                <label class="form-check-label" for="enabled">Enabled</label>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" value="{{$data->name}}" name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input id="url" value="{{$data->url}}" name="url" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="secret">Secret</label>
                <input id="secret" value="{{$data->secret}}" name="secret" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="events">Events</label>
                <select multiple="multiple" id="events" name="events[]" class="form-control">
                    @foreach($events as $event)
                        <option value="{{$event->name}}" {{in_array($event->name, $data->events) ? "selected" : ""}}>{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="Update"/>
        </form>
    </div>
</div>
@endsection
