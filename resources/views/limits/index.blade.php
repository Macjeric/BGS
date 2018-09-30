@extends('layouts.app')

@section('content')

<a href="/limits/create" class="btn btn-success">Create User</a>
<h1>Change Limits</h1>

<table class="table">
    <tr>
        <th>Limits ID</th>
        <th>User ID</th>
        <th>Travelling Cost</th>
        <th>Fuel Cost</th>
        <th>Postage Cost</th>
        <th>Fax Cost</th>

        <th>Edit</th>
        
    </tr>
    @foreach($limits as $limit)
    <tr>
    <td>{!!$limit-> limits_id!!}</td>
    <td>{!!$limit-> market_cost!!}</td>
    <td>{!!$limit-> travelling_cost!!}</td>
    <td>{!!$limit-> fuel_cost!!}</td>
    <td>{!!$limit-> postage_cost!!}</td>
    <td>{!!$limit-> fax_cost!!}</td>

    <td><a href="/limit/{{$limit->id}}/edit">Edit</a></td>

    </tr>
    @endforeach
</table>
@endsection


     
