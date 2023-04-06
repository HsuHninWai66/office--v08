@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3 class="ml-3" style="color:#3f51b5;">User Registr‌ation</h3>
        </div>

        <div class="title_right">
        <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
            <span class="input-group-btn">
            <a class="btn" type="button" href="{{ url('profile/add') }}" style="background-color:#3f51b5;color:#fff;"><span class="fa fa-arrow-left pr-2"> </span>Go to lists</a>
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
                @if (isset($sessionUserData))
                    {{ dd($sessionUserData) }}
                @endif
            <form action="{{ route('profileValidation') }}" method="POST">
            @csrf

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">First Name<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('first_name')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input type="text" class="form-control @error('first_name') parsley-error border border-danger @enderror"
                    name="first_name" placeholder="ex. first name" value="{{ old('first_name') }}"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Last Name<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('last_name')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input type="text" class="form-control @error('last_name') parsley-error border border-danger @enderror"
                    name="last_name" placeholder="ex. last name" value="{{ old('last_name') }}"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('email')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input type="email" class="form-control @error('email') parsley-error border border-danger @enderror"
                    name="email" placeholder="" value="{{ old('email') }}"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('password')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input type="password" class="form-control @error('password') parsley-error border border-danger @enderror"
                    name="password" placeholder="" value="{{ old('password') }}"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Confirm Password<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('conf_password')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input type="password" class="form-control @error('conf_password') parsley-error border border-danger @enderror"
                    name="conf_password" placeholder="" value="{{ old('conf_password') }}"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Role<span
                    class="required">*</span></label>

                <div class="col-md-6 col-sm-6">
                     @error('role')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <select class="form-control @error('role') parsley-error border border-danger @enderror" type="text" name="role" value="{{ old('role') }}"
                        data-validate-linked='email'>
                        <option value="">Choose Role</option>
                        <option value="Manager">Admin/HR</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>
            </div>

            <input class="form-control" type="hidden" name="status" value="1"/></div>

                <div class="col-md-6 offset-md-3">
                    <button type='reset' class="btn btn-secondary col-md-2">Reset</button>
                    <button type='submit' class="btn btn-gradiant col-md-3">Submit</button>
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
