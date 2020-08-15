@extends('layouts.layout')

@section('title')
Create Webhook
@endsection

@section('content')
<form method="POST" action="/webhooks/create">
    @csrf
    <label for="name">Name</label>
    <input id="name" name="name" type="text">
    <label for="url">Url</label>
    <input id="url" name="url" type="text">
    <label for="secret">Secret</label>
    <input id="secret" name="secret" type="text">
    <label for="events">Events</label>
    <input id="events" name="events" type="text">
    <input type="submit" value="Create"/>
</form>
@endsection
