@extends('layouts.app')

@section('content')
    <h2>Register Users</h2>
<a href="/Admin" class="btn btn-default">Back</a><br></br>


{!! Form::open(['action' => 'AdminsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter the  Name'])}}
        </div>

        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', '', ['class' => 'form-control', 'placeholder' => 'Enter the Quantity'])}}
                 </div>

                 
        <div class="form-group">
                {{Form::label('department', 'Department')}}
                {{Form::text('department', '', ['class' => 'form-control', 'placeholder' => 'Enter the Department'])}}
            </div>
        
         <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter the Quantity'])}}
             </div>

             {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
             {!! Form::close() !!}


             @endsection
