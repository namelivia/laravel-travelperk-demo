@extends('layouts.layout')

@section('title')
Users
@endsection

@section('content')
Schemas:
<pre>
	{{implode($response->schemas)}}
</pre>
<div class="mb-2 text-right">
    <a class="btn btn-primary" href="{{route('create-user')}}">New User</a>
</div>
<table class="table table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Active</th>
            <th>Groups</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($response->resources as $user)
        <tr>
            <td>
                <a href="{{route('user', ['id' => $user->id])}}">
                    {{ $user->id }}
                </a>
            </td>
            <td>
                {{ implode(' ',[
                     $user->name->honorificPrefix,
                     $user->name->givenName,
                     $user->name->middleName,
                     $user->name->familyName]
                   )
                }}
            </td>
            <td>
                {{ $user->userName }}
            </td>
            <td>
                {{ $user->active ? 'Yes' : 'No' }}
            </td>
            <td>
                {{ implode($user->groups) }}
            </td>
            <td>
                <div class="btn-group" role="group">
                    <a href="{{route('modify-user', ['id' => $user->id])}}">
                        <button class="btn btn-primary">Update</button>
                    </a>
                    <form method="POST" action="/users/{{$user->id}}">
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
@include('layouts.pagination')
@endsection
