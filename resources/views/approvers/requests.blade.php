@extends('layouts.approvers')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

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
                <div class="panel-heading" style="background:url(/img/bg2.jpg); background-size:cover; color: white;">My Requests</div>

                <div class="panel-body">
                    
                     <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name:</th>
                            <th>Date of Request:</th>
                            <th>Place:</th>
                            <th>Month</th>
                            <th>Total Cost</th>
                            <th>Budget Status</th>
                            <th>Approve</th>
                            <th>View</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($requests as $requests)
                          <tr>
                            <td>{{ $requests->name }}</td>
                            <td>{{ $requests->created_at }}</td>
                            <td>{{ $requests->place }}</td>
                            <td>{{ $requests->month }}</td>
                            <td>{{ $requests->market_cost+$requests->travelling_cost+$requests->fuel_cost+$requests->postage_cost+$requests->fax_cost }}</td>

                            @if($requests->budget_status == 'Approved')
                            <td class="success">
@if($requests->budget_status == 'created *')
Edited
@else
{{ $requests->budget_status }}
@endif
                            </td>
                            <td><button class="btn btn-success disabled">Approve</button></td>


                            @else
                            <td class="danger">
@if($requests->budget_status == 'created *')
Edited
@else
{{ $requests->budget_status }}
@endif
                            </td>
                            <td><a href="/approve/329382329383293823983238{{ $requests->budget_id }}874393239328923982378923782739237" class="btn btn-success">Approve</a></td>
                            @endif
                            <td><a href="/approver/openfile/18347588484{{ $requests->budget_id }}47383484939" class="btn btn-default">View File</a> </td>
                          </tr>
                          @endforeach
   
                        </tbody>
                      </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
