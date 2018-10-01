@extends('layouts.app')

@section('content')
    <h2>Edit Users</h2>
<a href="/admin" class="btn btn-default">Back</a><br></br>
    

    {!! Form::open(['action' => ['AdminController@update', $admin->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('id', 'Id')}}
        {{Form::text('id', $admin->id, ['class' => 'form-control', 'placeholder' => 'Enter the ID'])}}
    </div>
    <div class="form-group">
            {{Form::label('username', 'Name')}}
            {{Form::text('username', $admin->name, ['class' => 'form-control', 'placeholder' => 'Enter the  Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $admin->title, ['class' => 'form-control', 'placeholder' => 'Enter the Department'])}}
            </div>
        
         <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', $admin->email, ['class' => 'form-control', 'placeholder' => 'Enter the Quantity'])}}
             </div>

        <div class="form-group">
        {{Form::label('branch_id_', 'Branch ID')}}
        {{Form::text('branch_id_', $admin->branch_id_, ['class' => 'form-control', 'placeholder' => 'Enter the Quantity'])}}
             </div>


             {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
             {!! Form::close() !!}


             {!!Form::open(['action' => ['AdminController@destroy', $admin->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

   
             {!! Form::close() !!}
            
         @endsection