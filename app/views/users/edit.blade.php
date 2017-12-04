@extends('layouts.master')

@section('header1')
    <h1>Simple CRUDL - Laravel - Edit</h1>
@stop

@section('content') 

<div class="panel panel-success">
    <div class="panel-heading">
        <h4>Edit user</h4>
    </div>

    <div class="panel-body">
        @if (!empty($user))
        <form method="post" action="/users/update/{{ $user->id }}">
            <p>
                <input value="{{ $user->name }}" type="text" name="name" placeholder="Nombre" class="form-control" required>
            </p>
            <p>
                <input value="{{ $user->twitter }}" type="text" name="twitter" placeholder="Twitter" class="form-control" required>
            </p>
            <input type="submit" value="Save" class="btn btn-success">
            @else
            <p>
                There is not information for this user.
            </p>
            @endif
            <a href="/users" class="btn btn-default">Back</a>
        </form>
    </div>
</div>


<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>


@stop