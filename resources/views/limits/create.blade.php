@extends('layouts.admin')

@section('content')
    <h2>Create Limits</h2>
<a href="/limits" class="btn btn-default">Back</a><br></br>


{!! Form::open(['action' => 'LimitsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
<div class="form-group">
            {{Form::label('limits_id', 'ID')}}
            {{Form::text('limits_id', '', ['class' => 'form-control', 'placeholder' => 'Enter the Quantity'])}}
                 </div>


    <div class="form-group">
            {{Form::label('market_cost', 'Market Cost')}}
            {{Form::text('market_cost', '', ['class' => 'form-control', 'placeholder' => 'Enter the  Name'])}}
        </div>

        <div class="form-group">
            {{Form::label('travelling_cost', 'Travelling Cost')}}
            {{Form::text('travelling_cost', '', ['class' => 'form-control', 'placeholder' => 'Enter the Quantity'])}}
                 </div>

                 
        <div class="form-group">
                {{Form::label('fuel_cost', 'Fuel Cost')}}
                {{Form::text('fuel_cost', '', ['class' => 'form-control', 'placeholder' => 'Enter the Department'])}}
            </div>

            <div class="form-group">
                {{Form::label('postage_cost', 'Postage Cost')}}
                {{Form::text('postage_cost', '', ['class' => 'form-control', 'placeholder' => 'Enter the Department'])}}
            </div>
        
         <div class="form-group">
        {{Form::label('fax_cost', 'Fax Cost')}}
        {{Form::text('fax_cost', '', ['class' => 'form-control', 'placeholder' => 'Enter the Quantity'])}}
             </div>

             {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
             {!! Form::close() !!}


             @endsection
