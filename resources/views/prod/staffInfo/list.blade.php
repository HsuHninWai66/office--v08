@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="ml-3" style="color:#3f51b5;">Employee Information <i class="fa fa-asterisk"></i></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <span class="input-group-btn">
                    <a class="btn" type="button" href="{{ route('createStaff') }}" style="background-color:#3f51b5;color:#fff;">Add Staff <span class="fa fa-plus-circle pl-2"></span></a>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#d4edda;color:#155724;">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span span="" aria-hidden="true">×</span>
                </button>
            </div>

            @endif
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">

                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Profile </th>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Department</th>
                          <th>Email Address</th>
                          <th>Address</th>
                          <th>Registered DateTime</th>
                        </tr>
                      </thead>


                      <tbody>
                        @foreach($staff as $staffData)
                        <tr>
                          <td>{{ $staffData['id'] }}</td>
                          <td style="padding:3px;text-align:center;"><img src="{!! asset('/uploads/staff/'.$staffData['profile_img']) !!}" id="pic" width="60"></td>
                          <td><a href="{{ url('staff/detail/'.$staffData->id) }}"> {{ $staffData['first_name'] }} {{ $staffData['last_name'] }}</a><br>
                            <a href="{{ url('staff/detail/'.$staffData->id) }}" style="font-size:0.8em;" class="text-primary"><i class="fa fa-eye"></i> View Detail</a> |
                            <a href="{{ url('staff/delete/'.$staffData->id) }}" style="font-size:0.8em;" class="text-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                          <td>{{ $staffData['role'] }}</td>
                          <td>{{ $staffData['dept'] }}</td>
                          <td>{{ $staffData['email'] }}</td>
                          <td>{{ $staffData['address'] }}</td>
                          <td>{{ $staffData['created_at'] }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>


            </div>
                </div>
              </div>


                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- /page content -->
@include('layout.footer')
