@extends('layouts.approvers')
@section('content')

            <div class="container">
                <div class="row">

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
                             
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"  style="background:url(/img/bg2.jpg); background-size:cover; color: white;">Approve User's Budget Request</div>

                            <div class="panel-body">
                              <p><b>Name: </b> {{ $name->name }} - {{ $name->title }}</p>
                              <p><b>Location: </b> {{ $branch->b_name }} -- {{ $branch->b_region }} -- {{ $branch->b_zone }}</p>
                              <p><b>Total Cost: </b> {{ $total->total_cost }} </p>
                              <p><b>Expected Premium: </b> {{ $show_budget_details->expected_premium }} </p> <hr>

                              <h4>Approvals:</h4>

                              <div class="row">
                      <!--        <div class="col-lg-4">
                              <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Category:</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr><td>Reviewed by:</td></tr>
                                       <tr><td>Recommended for budget by:</td></tr>
                                       <tr><td>Recommended for activity by:</td></tr>
                                       <tr><td>Approved by:</td></tr>
                                   </tbody>
                               </table>
                           </div> -->

                        <div class="col-lg-12">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Category:</th>
                                        <th>Name:</th>
                                        <th>Comment:</th>
                                        <th>Status:</th>
                                        <th>Date:</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($show_reviewer as $reviewer)
                                      <tr>
                                        <td>{{ $reviewer->category }}</td>
                                        <td>
                                        @if( $reviewer->approving_user_id == 0)
                                        Pending
                                        @else
                                        {{ $reviewer->name }}
                                        @endif
                                        </td>
                                        <td>{{ $reviewer->comment }}</td>
                                        <td>{{ $reviewer->status }}</td>
                                        <td>{{ $reviewer->updated_at }}</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                              </div>
                          </div>

                    <form class="form-horizontal" role="form" method="POST" action="/approve/329382329383293823983238{{ $show_budget_details->budget_id }}874393239328923982378923782739237/go">
                         {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label for="comment" class="col-md-1 control-label">Comment: </label>

                            <div class="col-md-12">
                                <br><textarea id="comment" class="form-control" name="comment" required></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('reviewer') ? ' has-error' : '' }}">
                            <label for="reviewer" class="col-md-4 control-label">Forward To / Return To: </label>

                            <div class="col-md-6">
                                 <select name="reviewer" class="form-control" value="{{ old('reviewer') }}" id="reviewer" required autofocus>
                                   <option value="">Choose Reviewer: </option>
                                    @if(Auth::user()->title == 'PFA')
                                   
                                    @foreach($reviewer_list_1 as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @elseif(Auth::user()->title == 'HFA')

                                    @foreach($reviewer_list_2 as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @elseif(Auth::user()->title == 'DGM')
                                    <option value="">None</option>
                                    @foreach($reviewer_list_3 as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @else

                                   <option value="">None</option>

                                    @endif


                                 </select>
                                
                                @if ($errors->has('reviewer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reviewer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                              <div class="form-group">
                                            <div class="col-md-12">
                                                <br>
                             
                                                <button type="submit" class="btn btn-success btn-block">
                                                    Approve Request
                                                </button>
                               

                                                <br>
                                                @if(Auth::user()->title ==  'PFA')
                                                <a href="#" class="btn btn-warning btn-block disabled" disabled>Return Request</a>
                                                @else
                                               <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal">Return Request</button>
                                               @endif

                                               <br>
                                               <button data-toggle="modal" data-target="#rejectModal" class="btn btn-danger btn-block" >Reject Request</button>
                                               <br>
                                               <a href="/approver/requests/follow-up/32789{{ $show_budget_details->budget_id }}43789721/edit" class="btn btn-warning btn-block">Edit Details</a>
                                              <br>
                                              <a href="/approver/view/32789{{ $show_budget_details->budget_id }}43789721" class="btn btn-default btn-block">View</a>

                                            </div>
                                        </div>                              
                                 </form>

                    <!-- Modal for return-->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Return Request</h4>
                                    </div>
                                    <div class="modal-body">

                                <form class="form-horizontal" role="form" method="POST" action="/approve/329382329383293823983238{{ $show_budget_details->budget_id }}874393239328923982378923782739237/return">
                                     {{ csrf_field() }}

                                     <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <label for="comment" class="col-md-1 control-label">Comment: </label>

                                        <div class="col-md-12">
                                            <br><textarea id="comment" class="form-control" name="comment" required></textarea>

                                            @if ($errors->has('comment'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comment') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                        <div class="form-group{{ $errors->has('reviewer') ? ' has-error' : '' }}">
                            <label for="reviewer" class="col-md-4 control-label">Return To: </label>

                            <div class="col-md-6">
                                 <select name="reviewer" class="form-control" value="{{ old('reviewer') }}" id="reviewer" required autofocus>
                                   <option value="">Choose Reviewer: </option>
                                   @if( Auth::user()->title == 'HFA')
                                   
                                    @foreach($reviewer_list_2r as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @elseif(Auth::user()->title == 'DGM')
                                   
                                    @foreach($reviewer_list_3r as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @elseif(Auth::user()->title == 'GM')

                                    @foreach($reviewer_list_4r as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @else

                                   <option value="">None</option>

                                    @endif


                                 </select>
                                
                                @if ($errors->has('reviewer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reviewer') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>

                                <div class="form-group">
                                  <div class="col-md-12">
                                      <button class="btn btn-warning btn-block" type="submit">Return Request</button>
                                  </div>
                                </div>                              
                         </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ENd Modal 1-->

                    <!-- Modal for reject-->
                        <div class="modal fade" id="rejectModal" role="dialog">
                            <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Return Request</h4>
                                    </div>
                                    <div class="modal-body">
                     
                    <form class="form-horizontal" role="form" method="POST" action="/approve/329382329383293823983238{{ $show_budget_details->budget_id }}874393239328923982378923782739237/reject">
                               {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                          <label for="comment" class="col-md-1 control-label">Reason: </label>

                          <div class="col-md-12">
                              <br><textarea id="comment" class="form-control" name="comment" required></textarea>

                              @if ($errors->has('comment'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('comment') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>

                              <div class="form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-danger btn-block" type="submit">Reject Request</button>
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

@endsection