@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3 class="ml-3" style="color:#3f51b5;">Staff Management : Register</h3>
        </div>

        <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
            </span>
            </div>
        </div>
        </div>
    </div>

    <div class="clearfix"></div>

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
            <form action="{{ route('createStaff') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="field item form-group">

                <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('name')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input class="form-control @error('name') parsley-error border border-danger @enderror"
                    name="name" placeholder="ex. John f. Kennedy"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                <div class="col-md-6 col-sm-6 pl-3">
                    <div id="gender2" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="gender" value="male">Male
                    </label>
                    <label class="btn btn-primary active">
                        <input type="radio" name="gender" value="female"> Female
                    </label>
                    </div>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Department<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                @error('dept')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="text" class="form-control @error('dept') parsley-error border border-danger @enderror" name="dept"/></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Role<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                @error('role')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input class="form-control @error('role') parsley-error border border-danger @enderror" type="text" name="role"
                    data-validate-linked='email'/></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Office Hours<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                @error('office_time')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input class="form-control @error('office_time') parsley-error border border-danger @enderror" type="text" name="office_time"></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Employ Start Date<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                @error('em_start_date')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input class="form-control @error('em_start_date') parsley-error border border-danger @enderror" type="date" name="em_start_date"></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Experience Year<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                @error('experience_yr')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input class="form-control @error('experience_yr') parsley-error border border-danger @enderror" type="text" name="experience_yr"/></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Profile Photo<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                @error('profile_img')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input class="form-control @error('profile_img') parsley-error border border-danger @enderror" type="file" name="profile_img"/></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Sign<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="sign"/></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Remark<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                <textarea name='remark'></textarea></div>
            </div>
            <input class="form-control" type="hidden" name="status" value="1"/></div>

                <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Submit</button>
                    <button type='reset' class="btn btn-success">Reset</button>
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


        <!-- /page content -->
@include('layout.footer')
