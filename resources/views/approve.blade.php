<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CIB | Activity Planner</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        ACTIVITY PLANNER
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- Authentication Links -->
                                    @if (Auth::guest())
                                        <li><a href="{{ url('/login') }}">Login</a></li>
                                    @else

                                        <li>
                                            <a href="#"><i>Logged in as
                                                {{ Auth::user()->name }}
                                            </i></a>
                                        </li>


                                      <li>
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                      </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Approve User's Budget Request</div>

                            <div class="panel-body">
                              <p><b>Name: </b> {{ $name->name }} - {{ $name->title }}</p>
                              <p><b>Location: </b> {{ $branch->b_name }} -- {{ $branch->b_region }} -- {{ $branch->b_zone }}</p>
                              <p><b>Total Cost: </b> {{ $total->total_cost }} </p>
                              <p><b>Expected Premium: </b> {{ $show_budget_details->expected_premium }} </p> <hr>

<h4>Approvals:</h4>

<div class="row">
<div class="col-lg-4">
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
                           </div>

                        <div class="col-lg-8">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Name:</th>
                                        <th>Comment:</th>
                                        <th>Date:</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($show_reviewer as $reviewer)
                                      <tr>
                                        
                                        <td>
                                        @if( $reviewer->approving_user_id == 0)
                                        Pending
                                        @else
                                        {{ $reviewer->name }}
                                        @endif
                                        </td>
                                        <td>{{ $reviewer->comment }}</td>
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
                                   @if( Auth::user()->title == 'PFA')
                                   
                                    @foreach($reviewer_list_1 as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @elseif(Auth::user()->title == 'HFA')
                                   
                                    @foreach($reviewer_list_2 as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @elseif(Auth::user()->title == 'DGM')

                                    @foreach($reviewer_list_3 as $reviewer)
                                    <option value="{{ $reviewer->email }}">{{ $reviewer->name }} - {{ $reviewer->title }}</option>
                                    @endforeach

                                    @elseif(Auth::user()->title == 'GM')
                                    <option value="">None</option>
                                    @foreach($reviewer_list_4 as $reviewer)
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
                                               <a href="{{ url('/approve/id/go-return') }}" type="submit" class="btn btn-warning btn-block">Return Request</a>
                                               <br>
                                               <a href="{{ url('/approve/id/go-reject') }}" type="submit" class="btn btn-danger btn-block">Reject Request</a>
                                            </div>
                                        </div>                              
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>
 <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
