@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


                              @if (session('success'))
                             <div class="alert alert-success alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session('success') }}
                             </div>
                             @elseif (session('failure'))
                             <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session('failure') }}
                             </div>
                             @elseif (session('warning'))
                             <div class="alert alert-warning alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session('warning') }}
                             </div>
                             @endif

            <div class="panel panel-default">
                <div class="panel-heading"  style="background:url(/img/bg2.jpg); background-size:cover; color: white;">Current Amount Limits</div>
                <div class="panel-body">
                    
                    <table class="table">
              
                            
                            <tr><th>Category</th><th>Amount</th></tr>
                            <tr><th>Market Cost</th><td>{!! $limits->market_cost !!}</td></tr>
                            <tr><th>Travelling Cost</th><td>{!! $limits->travelling_cost !!}</td></tr>
                            <tr><th>Fuel Cost</th><td>{!! $limits->fuel_cost !!}</td></tr>
                            <tr><th>Postage Cost</th><td>{!! $limits->postage_cost !!}</td></tr>
                            <tr><th>Fax Cost</th><td>{!! $limits->fax_cost !!}</td></tr>
                            <tr><th>Last Update Date</th><td>{!! $limits->updated_at !!}</td></tr>
                            <tr><td colspan="2"><a href="/admin/limit/{{$limits->limits_id}}/edit" class="btn btn-success btn-block">Update Limits</a></td></tr>
                            <tr><td colspan="2"><a href="/admin/limit/{{$limits->limits_id}}/reset" class="btn btn-danger btn-block">Reset Amount Limits for all Users</a></td></tr>
                          
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


     
