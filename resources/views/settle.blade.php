@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settle business</div>

                <div class="panel-body">
                
                <form class="form-horizontal" role="form" method="POST" action="/requests/follow-up/32789{{ $balance->budget_id }}43789721/settle/post">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('final_remarks') ? ' has-error' : '' }}">
                            <label for="final_remarks" class="col-md-2 control-label">Final Remark:</label>

                            <div class="col-md-10">
                                <textarea id="name" class="form-control" name="final_remarks" required autofocus></textarea>

                                @if ($errors->has('final_remarks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('final_remarks') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('reviewer') ? ' has-error' : '' }}">
                            <label for="reviewer" class="col-md-2 control-label">Choose Reviewer: </label>

                            <div class="col-md-10">
                                 <select name="reviewer" class="form-control" value="{{ old('reviewer') }}" id="reviewer" required autofocus>
                                   <option value="">Choose Reviewer: </option>
                                    @foreach($reviewer_list as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach
                                 </select>
                                
                                @if ($errors->has('reviewer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reviewer') }}</strong>
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
                    

                    <div class="col-md-10 col-md-offset-2">
                        <div align="center"><b>OR</b></div><br>
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-block">
                            Push Forward
                        </button>
                    </div> 
                    <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Push Forward Action Date</h4>
                                    </div>
                                    <div class="modal-body">

                        <form class="form-horizontal" role="form" method="POST" action="/requests/follow-up/32789{{ $balance->budget_id }}43789721/push/post">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                            <label for="reason" class="col-md-2 control-label">Reason:</label>

                            <div class="col-md-10">
                                <textarea id="name" class="form-control" name="reason" required autofocus></textarea>

                                @if ($errors->has('reason'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('extended_date') ? ' has-error' : '' }}">
                            <label for="extended_date" class="col-md-2 control-label">Next Expected Action Date:</label>

                            <div class="col-md-10">
                                <input type="date" id="name" class="form-control" name="extended_date" required autofocus/>

                                @if ($errors->has('extended_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('extended_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Push Forward
                                </button>
                            </div>
                        </div>
                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
