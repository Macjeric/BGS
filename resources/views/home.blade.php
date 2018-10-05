@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <b>Account Balance:</b> {{ $balance->resultant_balance }} TZS
                   <br><br>
                   <p align="center"> <b>Budget Total Cost to Total Amount in Current Quarter</b></p>
            <graph :keys="{{ $amount->keys() }}"  :values="{{ $amount->values() }}"></graph>

    		<script src ="/js/main.js"> </script>
        </div>
    </div>
</div>
</div>
</div>

 
@endsection
