@extends('layouts.app')

@section('content')

<a href="/register" class="btn btn-default">Create User</a>
<h1>Admins Page</h1>

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
    <td>{!!$admin-> name!!}</td>
    <td>{!!$admin-> email!!}</td>
    <td>{!!$admin-> title!!}</td>
    <td>{!!$admin-> branch_id_!!}</td>
    <td>{!!$admin-> status!!}</td>

    <td><a href="/admin/{{$admin->id}}/edit">Edit</a></td>

    </tr>
    @endforeach
</table>
@endsection


     
