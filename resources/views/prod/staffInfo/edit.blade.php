@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3 class="ml-3" style="color:#3f51b5;">Staff Management : Edit</h3>
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
            <form action="{{ route('editValidateStaff', $staffData->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                <div class="col-md-3 col-sm-3">
                    <input type="text" class="form-control" name="first_name" value="{{ $staffData['first_name'] }}" />
                </div>
                <div class="col-md-3 col-sm-3">
                    <input type="text" class="form-control" name="last_name" value="{{ $staffData['last_name'] }}" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                <div class="col-md-6 col-sm-6 pl-3">
                    <div id="gender2" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="gender" value="male"
                        @if ($staffData['gender'] == 'male') checked @endif>Male
                    </label>
                    <label class="btn btn-primary active">
                        <input type="radio" name="gender" value="female" @if ($staffData['gender'] == 'female') checked @endif> Female
                    </label>
                    </div>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Birth Date<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                @error('birthdate')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input class="form-control @error('birthdate') parsley-error border border-danger @enderror" type="date" name="birthdate" value="{{ $staffData['birthdate'] }}" >
            </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Email Address<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('email')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input class="form-control @error('email') parsley-error border border-danger @enderror"
                    name="email" placeholder="ex. staff@gmail.com" value="{{ $staffData['email'] }}" />
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Phone Number<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    @error('phone_number')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input class="form-control @error('phone_number') parsley-error border border-danger @enderror"
                    name="phone_number" placeholder="ex. 09-00000-00000" value="{{ $staffData['phone_number'] }}" />
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Address</label>
                <div class="col-md-6 col-sm-6">
                    @error('address')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                    <input class="form-control @error('address') parsley-error border border-danger @enderror"
                    name="address" placeholder="ex. No.xxx,xxxx,xxx." value="{{ $staffData['address'] }}"/>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Department<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="form-control @error('dept') parsley-error border border-danger @enderror" name="dept">
                        <option value="">Choose Department</option>
                        @foreach ($departments as $dept )
                            <option value="{{ $dept->name }}" @if($staffData['dept'] == $dept->name ) selected @endif>{{ $dept->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Role<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <select class="form-control @error('role') parsley-error border border-danger @enderror" name="role">
                        <option value="">Choose Department</option>
                        @foreach ($position as $pos )
                            <option value="{{ $pos->position }}" @if($staffData['role'] == $pos->position ) selected @endif>{{ $pos->position }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Office Hours<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="office_time" value="{{ $staffData['office_time'] }}" ></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Employ Start Date<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="date" name="em_start_date" value="{{ $staffData['em_start_date'] }}" ></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Experience Year<span
                    class="required">*</span></label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="experience_yr" value="{{ $staffData['experience_yr'] }}" readonly/></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Profile Photo<span
                    class="required">*</span></label>
                <div class="col-md-2 col-sm-3">
                    <img src="/uploads/staff/{{ $staffData['profile_img'] }}" width="100%">
                    <input class="form-control @error('profile_img') parsley-error border border-danger @enderror" type="file" name="profile_img" value="{{ $staffData['profile_img'] }}"/></div>
                </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Sign</label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="sign" value="{{ $staffData['sign'] }}" /></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">KBZ Bank Acc</label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="kbz_bank_acc" value="{{ $staffData['kbz_bank_acc'] }}" /></div>
            </div>


            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">KPay Number</label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="kbz_pay" value="{{ $staffData['kbz_pay'] }}" /></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">AYA Bank Acc</label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="aya_bank" value="{{ $staffData['aya_bank'] }}" /></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Yoma Bank Acc</label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="yoma_bank" value="{{ $staffData['yoma_bank'] }}" /></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Wave Number</label>
                <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="wave_money_number" value="{{ $staffData['wave_money_number'] }}" /></div>
            </div>

            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Remark</label>
                <div class="col-md-6 col-sm-6">
                <textarea name='remark' >{{ $staffData['remark'] }}</textarea></div>
            </div>
            <input class="form-control" type="hidden" name="status" value="1"/></div>

                <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <button type='reset' class="btn btn-secondary col-md-2" onclick="history.go(-1)">Back</button>
                    <button type='submit' class="btn btn-gradiant col-md-3">Submit</button>
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
