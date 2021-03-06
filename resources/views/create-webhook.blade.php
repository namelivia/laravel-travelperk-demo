@extends('layouts.layout')

@section('title')
Create Webhook
@endsection

@section('content')
<form method="POST" action="/webhooks/create">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="url">Url</label>
        <input id="url" name="url" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="secret">Secret</label>
        <input id="secret" name="secret" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="events">Events</label>
        <select multiple="multiple" id="events" name="events[]" class="form-control">
            @foreach($events as $event)
                <option value="{{$event->name}}">{{ $event->name }}</option>
            @endforeach
        </select>
    </div>
    <input class="btn btn-success" type="submit" value="Create"/>
</form>
@endsection
