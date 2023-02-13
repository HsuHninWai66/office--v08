@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3 class="ml-3" style="color:#3f51b5;">Change Password</h3>
        </div>

        <div class="title_right">
        <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
            <span class="input-group-btn">
            <a class="btn" type="button" href="{{ route('changepassword') }}" style="background-color:#3f51b5;color:#fff;"><span class="fa fa-arrow-left pr-2"> </span>Go to lists</a>
            </span>
            </div>
        </div>
        </div>
    </div>

    <div class="clearfix"></div>

    @if (session('error'))
        <div class="alert alert-danger show mb-2" role="alert" style="background-color:#ff291617;color:#ac0000;">
        {{session('error')}}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success show mb-2" role="alert" style="background-color:#d4edda;color:#155724;">
        {{session('success')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
            <h2>Profile Password Change</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">

            <form action="{{ route('changepassword') }}" method="POST">
            @csrf

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Current Password<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('old-password')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input type="password" class="form-control @error('old-password') parsley-error border border-danger @enderror"
                    name="old-password" placeholder="*******" value=""/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">New Password<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('new-password')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input type="password" class="form-control @error('new-password') parsley-error border border-danger @enderror"
                    name="new-password" placeholder="*******" value=""/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Confirm New Password<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('confirm-password')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input type="password" class="form-control @error('confirm-password') parsley-error border border-danger @enderror"
                    name="confirm-password" placeholder="*******" value=""/>
                </div>
            </div>

            <div class="col-md-6 offset-md-3">
                <button type='reset' class="btn btn-secondary">Reset</button>
                <button type='submit' class="btn btn-gradiant">Submit</button>
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
