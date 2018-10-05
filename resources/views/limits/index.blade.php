@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Change Limits</div>
                <div class="panel-body">
                    
                    <table class="table">
              
                            @foreach($limits as $limit)
                            <tr><th>Limits ID</th><td>{!! $limit->limits_id !!}</td></tr>
                            <tr><th>Market Cost</th><td>{!! $limit->market_cost !!}</td></tr>
                            <tr><th>Travelling Cost</th><td>{!! $limit->travelling_cost !!}</td></tr>
                            <tr><th>Fuel Cost</th><td>{!! $limit->fuel_cost !!}</td></tr>
                            <tr><th>Postage Cost</th><td>{!! $limit->postage_cost !!}</td></tr>
                            <tr><th>Fax Cost</th><td>{!! $limit->fax_cost !!}</td></tr>

                            <tr><td colspan="2"><a href="/limit/{{$limit->id}}/edit" class="btn btn-primary btn-block">Update Limits</a></td></tr>
                           @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


     
