@extends('layouts.approvers')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="background:url(/img/bg2.jpg); background-size:cover; color: white;">Settle Business</div>

                <div class="panel-body">
                    

                     <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name:</th>
                            <th>Month</th>
                            <th>Place</th>
                            <th>Output Description</th>
                            <th>Remarks/Feedback</th>
                            <th>Final Remarks</th>
                            <th>Approved By</th>
                            <th>Date</th>
                            <th>Business Status</th>
                            <th>Approve</th>
                          </tr>
                        </thead>
                        <tbody>
                        	@foreach($remarks as $remarks)
                        	<tr>
                            <td>{{ $remarks->name }}</td>
                            <td>{{ $remarks->month }}</td>
                            <td>{{ $remarks->place }}</td>
                            <td>{{ $remarks->description }}</td>
                            <td>{{ $remarks->remarks }}</td>
                            <td>{{ $remarks->final_remarks }}</td>
                            <td>{{ $remarks->reviewer }}</td>
                            <td>{{ $remarks->updated_at }}</td>
                            <td>{{ $remarks->remark_status }}</td>
                            @if($remarks->remark_status == 'Business Settled')
                            <td><button class="btn btn-success disabled">Approve</button></td>
                            @else
                            <td><a href="/approver/remarks/approve/83921283{{ $remarks->remark_id }}83930293" class="btn btn-success">Approve</a></td>
                            @endif
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
