
@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background:url(/img/bg2.jpg); background-size:cover; color: white;">Update Request:</div>
                <div class="panel-body">
                    

                    <form class="form-horizontal" role="form" method="POST" action="/admin/limit/{{ $limits->limits_id }}/edit/post">
                        {{ csrf_field() }}
      

                        <div class="form-group{{ $errors->has('market_cost') ? ' has-error' : '' }}">
                            <label for="market_cost" class="col-md-4 control-label">Market Cost</label>

                            <div class="col-md-6">
                                <input id="market_cost" type="text" class="inst_amount form-control" name="market_cost" pattern="[0-9]{*}" value="{{ $limits->market_cost }}" required>

                                @if ($errors->has('market_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('market_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('travelling_cost') ? ' has-error' : '' }}">
                            <label for="travelling_cost" class="col-md-4 control-label">Travelling Local Cost</label>

                            <div class="col-md-6">
                                <input id="travelling_cost" type="text" class="inst_amount form-control" name="travelling_cost" pattern="[0-9]{*}" value="{{ $limits->travelling_cost }}" required>

                                @if ($errors->has('travelling_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travelling_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fuel_cost') ? ' has-error' : '' }}">
                            <label for="fuel_cost" class="col-md-4 control-label">M/V Fuel & Lubricants Cost</label>

                            <div class="col-md-6">
                                <input id="fuel_cost" type="text" class="inst_amount form-control" name="fuel_cost" pattern="[0-9]{*}" value="{{ $limits->fuel_cost }}" required>

                                @if ($errors->has('fuel_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fuel_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postage_cost') ? ' has-error' : '' }}">
                            <label for="postage_cost" class="col-md-4 control-label">Postage Cost</label>

                            <div class="col-md-6">
                                <input id="postage_cost" type="text" class="inst_amount form-control" name="postage_cost" pattern="[0-9]{*}" value="{{ $limits->postage_cost }}" required>

                                @if ($errors->has('postage_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postage_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fax_cost') ? ' has-error' : '' }}">
                            <label for="fax_cost" class="col-md-4 control-label">Fax Cost</label>

                            <div class="col-md-6">
                                <input id="fax_cost" type="text" class="inst_amount form-control" name="fax_cost" pattern="[0-9]{*}" value="{{ $limits->fax_cost }}" required>

                                @if ($errors->has('fax_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fax_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Update Limits
                                </button>
                            </div>
                        </div>
     
                    </form>
                
            </div>
        </div>
        </div>
    </div>
</div>

             @endsection
