@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="ml-3" style="color:#3f51b5;">Admin User List <i class="fa fa-users"></i></h3>
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
                <div class="alert alert-success show mb-2" role="alert" style="background-color:#d4edda;color:#155724;">
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
                          <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>@if($user->role == 'Manager') Admin/HR @else Staff @endif</td>
                          <td>@if($user->status == 1) <span class="badge badge-success">opened</span> @else <span class="badge badge-secondary">closed</span>  @endif</span></td>
                          <td>{{ $user->created_at }}</td>
                          <td><a href="{{ url('profile/edit/' . $user->id) }}" class="text-primary"><i class="fa fa-edit"></i> Edit</a> | <a href="#" class="text-danger deleteBtn" data-link="{{ $user->id }}"><i class="fa fa-trash"></i> Delete</a></td>
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

        <!-- Modal HTML -->
        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Warning!</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">Are you sure? Do you want to delete profile?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary px-2 mr-1 rounded-0" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-sm btn-danger px-2 mr-1 rounded-0" id="deleteProfile" onclick="">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- /page content -->
@include('layout.footer')

<script>
    $(document).ready( function () {
        $(".deleteBtn").click(function() {
            $("#myModal").modal('show');
            let dd = $(this).data('link');
            $('#deleteProfile').attr('onclick', `location.href='{{ url('profile/delete') }}/${dd}'`);
         });
    });
</script>
