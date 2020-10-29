@extends('layouts.layout')

@section('title')
TravelSafe
@endsection

@section('content')
<h1>TravelSafe</h1>
<form method="POST" action="/travelsafe/restrictions">
    @csrf
    <div class="form-group">
        <label for="origin">Origin</label>
        <input id="origin" name="origin" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="destination">Destination</label>
        <input id="destination" name="destination" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="originType">Origin Type</label>
        <select id="originType" name="originType" class="form-control">
            @foreach($locationTypes as $locationType)
                <option value="{{$locationType}}">{{$locationType}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="destinationType">Origin Type</label>
        <select id="destinationType" name="destinationType" class="form-control">
            @foreach($locationTypes as $locationType)
                <option value="{{$locationType}}">{{$locationType}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input id="date" name="date" type="text" class="form-control">
    </div>
    <input class="btn btn-success" type="submit" value="Request"/>
</form>
<form method="POST" action="/travelsafe/summary">
    @csrf
    <div class="form-group">
        <label for="location">Location</label>
        <input id="location" name="location" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="locationType">Origin Type</label>
        <select id="locationType" name="locationType" class="form-control">
            @foreach($locationTypes as $locationType)
                <option value="{{$locationType}}">{{$locationType}}</option>
            @endforeach
        </select>
    </div>
    <input class="btn btn-success" type="submit" value="Request"/>
</form>
<form method="POST" action="/travelsafe/airline">
    @csrf
    <div class="form-group">
        <label for="iata">Airline</label>
        <input id="iata" name="iata" type="text" class="form-control">
    </div>
    <input class="btn btn-success" type="submit" value="Request"/>
</form>
@endsection
