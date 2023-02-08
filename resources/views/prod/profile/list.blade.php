@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="ml-3" style="color:#3f51b5;">Admin User List</h3>
              </div>

              <div class="title_right">
                <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <span class="input-group-btn">
                    <a class="btn" type="button" href="{{ url('profile/add') }}" style="background-color:#3f51b5;color:#fff;">Add User<span class="fa fa-plus-circle pl-2"></span></a>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            @if (session('success'))
                <div class="alert alert-success show mb-2" role="alert">
                {{session('success')}}
                </div>
            @endif

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Users</h2>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Permission</th>
                          <th>Registered date</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->role }}</td>
                          <td>@if($user->status == 1) opened @else closed @endif</td>
                          <td>{{ $user->created_at }}</td>
                          <td><a href="{{ url('profile/edit/' . $user->id) }}" class="text-primary">Edit</a> | <a href="#" class="text-danger">Delete</a></td>
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
