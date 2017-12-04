@extends('layouts.master')

@section('header1')
    <h1>Simple CRUDL - Laravel - Create</h1>
@stop

@section('content') 

<div class="panel panel-success">
    <div class="panel-heading">
        <h4>Create user</h4>
    </div>

    <div class="panel-body">
        <form method="post" action="store">
            <p>
                <input type="text" name="name" placeholder="Name" class="form-control" required>
            </p>
            <p>
                <input type="text" name="twitter" placeholder="Twitter" class="form-control" required>
            </p>
            <p>
                <input type="submit" value="Save" class="btn btn-success">
            </p>
        </form>
    </div>
</div>


<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>


@stop