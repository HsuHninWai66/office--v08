@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3 class="ml-3" style="color:#3f51b5;">Staff Position <small><i class="fa fa-asterisk"></i></small></h3>
        </div>

        <div class="title_right">
        <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
            <span class="input-group-btn">
            {{-- <a class="btn" type="button" href="{{ url('staff/list')}}" style="background-color:#3f51b5;color:#fff;"><span class="fa fa-arrow-left pr-2"> </span>Go to lists</a> --}}
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
        <div class="col-md-5 col-sm-5 m-0-auto">
            <div class="x_panel">
                <div class="x_title">
                  <h2>Registration</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                  <form action="{{ route('createPosition') }}" method="POST">
                    @csrf

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Department<span
                            class="required">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control @error('dept_id') parsley-error border border-danger @enderror" name="dept_id">
                                    <option value="">Choose Department</option>
                                    @foreach ($departments as $dept )
                                        <option value="{{ $dept->id }}" @if(old('dept') == $dept->id ) selected @endif>{{ $dept->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Position<span
                            class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                        @error('position')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                        <input class="form-control @error('position') parsley-error border border-danger @enderror" type="text" name="position" value="{{ old('position') }}" placeholder="Ex.Web Developer"/></div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Remark<span
                            class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                        @error('remark')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                        <textarea class="form-control @error('remark') parsley-error border border-danger @enderror" type="text" name="remark" value="{{ old('remark') }}" placeholder="Ex.Lorem ipsum ..."></textarea></div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-9 col-sm-9 offset-md-3 mt-3">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-gradiant">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>

        </div>

        <div class="col-md-7 col-sm-7">
            <div class="x_panel">
              <div class="x_title">
                <h2>Lists </h2>
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
                      <th>Position</th>
                      <th>Department</th>
                      <th>Remark</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($position as $posData)
                    <tr>
                      <td>{{ $posData->position }}</td>
                      <td>
                        @foreach ($departments as $depart)
                            @if($posData ->dept_id == $depart->id) {{ $depart->name }} @endif
                        @endforeach
                      </td>
                      <td>@if (isset($posData['remark'])) {{ $posData['remark'] }} @else .... @endif</td>
                      <td><a href="{{ url('position/edit/' . $posData->id) }}" class="text-primary"><i class="fa fa-edit"></i> Edit</a> | <a href="#" class="text-danger deleteBtn" data-link="{{ $posData->id }}"><i class="fa fa-trash"></i> Delete</a></td>
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
                <p class="text-danger">Are you sure? Do you want to delete department?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary px-2 mr-1 rounded-0" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-danger px-2 mr-1 rounded-0" id="deletePosition" onclick="">Delete</button>
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
            $('#deletePosition').attr('onclick', `location.href='{{ url('department/delete') }}/${dd}'`);
         });
    });
</script>
