@extends('layouts.layout')

@section('title')
Update Cost Center
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <form method="POST" action="/cost-centers/{{$data->id}}/update">
            @csrf
            <div class="form-check">
                <input id="archived" {{ $data->archived ? 'checked="checked"' : '' }} value="1" name="archived" type="checkbox" class="form-check-input">
                <label class="form-check-label" for="archived">Archived</label>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" value="{{$data->name}}" name="name" type="text" class="form-control">
            </div>
            <input class="btn btn-primary" type="submit" value="Update"/>
        </form>
    </div>
</div>
@endsection
