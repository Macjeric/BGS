@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   <b>Account Balance:</b> {{ $balance->resultant_balance }} TZS
        </div>
    </div>
</div>

@endsection
