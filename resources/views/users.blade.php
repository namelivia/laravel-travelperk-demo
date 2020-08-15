@extends('layouts.layout')

@section('title')
Users
@endsection

@section('content')
<form method="GET" action="/users">
    <label for="offset">Offset</label>
    <input id="offset" name="offset" type="number" value="{{ $response->offset}}">
    <label for="limit">Limit</label>
    <input id="limit" name="limit" type="number" value="{{ $response->limit }}">
    <label for="account_number">TravelPerk Bank Account Number</label>
    <input id="account_number" name="account_number" type="text" value="{{ $account_number }}">
    <input type="submit" value="Apply"/>
</form>
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->users as $user)
        <tr>
            <td>
                <a href="{{route('user', ['serialNumber' => $user->id])}}">
                    {{ $user->id }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
