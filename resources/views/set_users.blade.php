@extends('layouts.layout')

@section('title')
Set users for cost center
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <form method="POST" action="/cost-centers/{{$data->id}}/set_users">
            @csrf
            <div class="form-group">
                <label for="users">Users</label>
                <select multiple="multiple" id="users" name="users[]" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}" {{in_array($user->id, array_column($data->users, 'id')) ? "selected" : ""}} >{{ $user->userName }}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="Save"/>
        </form>
    </div>
</div>
@endsection
