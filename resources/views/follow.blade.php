@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
   
            <div class="panel panel-primary">
                <div class="panel-heading"><b>Follow up: </b>Budget Request Details for the month XXXX:</div>

                <div class="panel-body">
                      <div class="row">

                      <div class="col-md-6"><b>Business Status: </b>Not settled
@if( $show_status<1 )
        <a href="#" class="disabled">Settle Business</a>
@else
        <a href="{{ url('/requests/follow-up/id/settle') }}">Settle Business</a>
@endif
                       </div>
    

                      <div align="right" class="col-md-6"><b>Edit details: </b><a href="{{ url('/requests/follow-up/id/edit') }}">Edit</a></div>
                      </div>
@foreach($show_budget_details as $show)
                      
                      <table class="table table-responsive table-bordered table-hover table-striped">
                            <th colspan="2" style="text-align: center;">Budget Details</th>
                            <tr><td>Name:</td><td>{{ Auth::user()->name }}</td></tr>
                            <tr><td>Title</td><td>{{ Auth::user()->title }} - {{ $branch->b_name }} -- {{ $branch->b_region }} -- {{ $branch->b_zone }}</td></tr>
                            <tr><td>Month</td><td>{{ $show->month }}</td></tr>
                            <tr><td>Market Cost</td><td>{{ $show->market_cost }}</td></tr>
                            <tr><td>Travelling Local Cost</td><td>{{ $show->travelling_cost }}</td></tr>
                            <tr><td>M/V Fuel & Lubricants Cost</td><td>{{ $show->fuel_cost }}</td></tr>
                            <tr><td>Postage Cost</td><td>{{ $show->postage_cost }}</td></tr>
                            <tr><td>Fax Cost</td>{{ $show->fax_cost }}<td></td></tr>
                            <tr><td>Total Cost</td><td>{{ $total->total_cost }}</td></tr>
                            <tr><td>Expected Output Description:</td><td>{{ $show->description }}</td></tr>
                            <tr><td>Expected Premium</td><td>{{ $show->expected_premium }}</td></tr>
           
                      </table>  

@endforeach
             <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Category:</th>
                    <th>Name:</th>
                    <th>Comment:</th>
                    <th>Date:</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($show_reviewer as $reviewer)
                  <tr>
                    <td>{{ $reviewer->category }}</td>
                    <td>
                    @if( $reviewer->approving_user_id != 0)
                    {{ $reviewer_name->name }}
                    @else
                    Pending
                    @endif
                    </td>
                    <td>{{ $reviewer->comment }}</td>
                    <td>{{ $reviewer->created_at }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
<hr>
 @if( $show_status<1 )
            <p><b>Implementation status of Activities:</b></p>
            <form class="form-horizontal" action="#">
                         <div class="form-group">
                            <label class="col-md-2 control-label">Remarks:</label>
                            <div class="col-md-10">
                                <textarea id="name" class="form-control" name="remarks" disabled></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Actual Cost</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="actual_cost" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Expected Action Date:</label>

                            <div class="col-md-10">
                                <input class="form-control" name="action_date" disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-block disabled" disabled>
                                    Submit Remarks
                                </button>
                            </div>
                        </div>
                    </form>
@else
 

            <p><b>Implementation status of Activities:</b></p>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/requests/follow-up/remarks') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                            <label for="remarks" class="col-md-2 control-label">Remarks:</label>

                            <div class="col-md-10">
                                <textarea id="name" class="form-control" name="remarks" required autofocus></textarea>

                                @if ($errors->has('remarks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remarks') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('actual_cost') ? ' has-error' : '' }}">
                            <label for="actual_cost" class="col-md-2 control-label">Actual Cost</label>

                            <div class="col-md-10">
                                <input id="actual_cost" type="text" class="form-control" name="actual_cost" pattern="[0-9]{*}" required>

                                @if ($errors->has('actual_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('actual_cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('action_date') ? ' has-error' : '' }}">
                            <label for="action_date" class="col-md-2 control-label">Expected Action Date:</label>

                            <div class="col-md-10">
                                <input type="date" id="name" class="form-control" name="action_date" required autofocus/>

                                @if ($errors->has('action_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('action_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit Remarks
                                </button>
                            </div>
                        </div>
                    </form>
@endif
            </div>
        </div>
   
</div>
@endsection
