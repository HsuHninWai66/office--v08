@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-6 col-md-6 col-sm-6  ">
                        <div class="tile-stats col-bg">
                          <div class="icon" style="width:170px;top:-2px;right:0;"><img src="{!! asset('images/d-01.png') !!}" style="width:100%;" alt=""></i>
                          </div>
                          <div class="count" style="font-family: 'Yu Mincho';">ようこそ！</div>

                          <h5 class="pl-3" style="text-transform:uppercase;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                          <p>for the best office management</p>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-6 col-md-6 col-sm-6  ">
                        <div class="tile-stats col-bg">
                          <div class="icon" style="width:170px;top:-2px;right:0;"><img src="{!! asset('images/d-03.png') !!}" style="width:100%;" alt=""></i>
                          </div>
                          <div class="count" style="font-family: 'Yu Mincho';">ダッシュボード画面</div>
                          <h5 class="pl-3" style="text-transform:uppercase;">I'm {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                          <p>Total Staff, Timecard System, General Cost</p>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats dash-col-pink">
                          <div class="icon" style="color:#FFF;"><i class="fa fa-user"></i>
                          </div>
                          <div class="count" style="color:#FFF;">179</div>

                          <h3 style="color:#FFF;">Admin</h3>
                          <p style="color:#FFF;">Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats dash-col-purple">
                          <div class="icon" style="color:#FFF;"><i class="fa fa-users"></i>
                          </div>
                          <div class="count" style="color:#FFF;">179</div>

                          <h3 style="color:#FFF;">Total Staff</h3>
                          <p style="color:#FFF;">Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats dash-col-pink">
                          <div class="icon" style="color:#FFF;"><i class="fa fa-dollar"></i>
                          </div>
                          <div class="count" style="color:#FFF;">179</div>

                          <h3 style="color:#FFF;">Cost</h3>
                          <p style="color:#FFF;">Lorem ipsum psdea itgum rixt.</p>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats dash-col-purple">
                          <div class="icon" style="color:#FFF;"><i class="fa fa-comments-o"></i>
                          </div>
                          <div class="count" style="color:#FFF;">179</div>

                          <h3 style="color:#FFF;">Admin</h3>
                          <p style="color:#FFF;">Lorem ipsum psdea itgum rixt.</p>
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
