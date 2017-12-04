@extends('layouts.master')

@section('title')
    Welcome to the Laravel Simple CRUDL
@stop

@section('content')

<div class="panel panel-success">
    <div class="panel-heading">
        <h4>User list</h4>
    </div>

    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Twitter</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->twitter }}</td>
                    <td>
                        <a href="/users/show/{{ $user->id }}"><span class="label label-info">Read</span></a>
                        <a href="/users/edit/{{ $user->id }}"><span class="label label-success">Edit</span></a>
                        <a href="{{ url('/users/destroy',$user->id) }}"><span class="label label-danger">Delete</span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>

@stop