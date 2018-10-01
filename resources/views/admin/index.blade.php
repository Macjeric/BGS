<<<<<<< HEAD
@extends('layouts.admin')

@section('content')

<a href="/admin/register-user" class="btn btn-success">Create User</a>
=======
@extends('layouts.app')

@section('content')

<a href="/register" class="btn btn-success">Create User</a>
>>>>>>> bae2e97a9c399661428bb8abf247ceb15427e0a5
<h1>Users</h1>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Title</th>
        <th>Branch ID</th>
        <th>Status</th>

        <th>Edit</th>
        
    </tr>
    @foreach($admins as $admin)
    <tr>
    <td>{!!$admin-> id!!}</td>
    <td>{!!$admin-> username!!}</td>
    <td>{!!$admin-> email!!}</td>
    <td>{!!$admin-> title!!}</td>
    <td>{!!$admin-> branch_id_!!}</td>
    <td>{!!$admin-> status!!}</td>

    <td><a href="/admin/{{$admin->id}}/edit">Edit</a></td>

    </tr>
    @endforeach
</table>
@endsection


     
