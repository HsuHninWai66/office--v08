@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3 class="ml-3" style="color:#3f51b5;">Department <small><i class="fa fa-building-o"></i></small></h3>
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

    <div class="row">
        <div class="col-md-5 col-sm-5 m-0-auto">
            <div class="x_panel">
                <div class="x_title">
                  <h2>Edit</h2>
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

                  <form action="{{ route('editValidate', $departments->id) }}" method="POST">
                    @csrf

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span
                            class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                        @error('name')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                        <input class="form-control @error('name') parsley-error border border-danger @enderror" type="text" name="name" value="{{ $departments['name'] }}" /></div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Remark<span
                            class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                        @error('remark')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                        <textarea class="form-control @error('remark') parsley-error border border-danger @enderror" type="text" name="remark" value="{{ $departments['remark'] }}">{{ $departments['remark'] }}</textarea></div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-9 col-sm-9 offset-md-3 mt-3">
                        <button class="btn btn-secondary" type="reset" onclick="history.go(-1)">Back</button>
                        <button type="submit" class="btn btn-gradiant">Submit</button>
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
        </div>
    </div>
    </div>
</div>

<!-- /page content -->
@include('layout.footer')
