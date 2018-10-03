@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">User Management</div>

                <div class="panel-body">

<a href="/admin/register-user" class="btn btn-success btn-block">Create User</a><br>

<table class="table">
    <tr>
        <th>Name</th>
        <th>User ID</th>
        <th>Email</th>
        <th>Title</th>
        <th>Branch ID</th>
        <th>Status</th>

        <th>Edit</th>
        
    </tr>
    @foreach($admins as $admin)
    <tr>
    <td>{!!$admin->name!!}</td>
    <td>{!!$admin->username!!}</td>
    <td>{!!$admin->email!!}</td>
    <td>{!!$admin->title!!}</td>
    <td>{!!$admin->branch_id_!!}</td>
    <td>{!!$admin->status!!}</td>

    <td><a href="/admin/{{$admin->id}}/edit" class="btn btn-primary btn-block">Edit</a></td>

    </tr>
    @endforeach
</table>
        </div>
    </div>
</div>
</div>


@endsection


     
