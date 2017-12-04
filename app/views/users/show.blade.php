@extends('layouts.master')

@section('header1')
    <h1>Simple CRUDL - Laravel - Show</h1>
@stop

@section('content') 

<div class="panel panel-success">
    <div class="panel-heading">
        <h4>User Information</h4>
    </div>

    <div class="panel-body">
        @if (!empty($user))
        <p>
            Nombre: <strong>{{ $user->name }}</strong>
        </p>
        <p>
            Twitter: <strong>{{ $user->twitter }}</strong>
        </p>
        @else
        <p>
            Not exist information for this user.
        </p>
        @endif
        <a href="/users" class="btn btn-default">Back</a>
    </div>
</div>

@stop