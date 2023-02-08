@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="ml-3" style="color:#3f51b5;">Staff Information: <small>All lists</small></h3>
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
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                        </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>63</td>
                          <td>2011/07/25</td>
                          <td>$170,750</td>
                        </tr>
                        <tr>
                          <td>Ashton Cox</td>
                          <td>Junior Technical Author</td>
                          <td>San Francisco</td>
                          <td>66</td>
                          <td>2009/01/12</td>
                          <td>$86,000</td>
                        </tr>
                        <tr>
                          <td>Michael Bruce</td>
                          <td>Javascript Developer</td>
                          <td>Singapore</td>
                          <td>29</td>
                          <td>2011/06/27</td>
                          <td>$183,000</td>
                        </tr>
                        <tr>
                          <td>Donna Snider</td>
                          <td>Customer Support</td>
                          <td>New York</td>
                          <td>27</td>
                          <td>2011/01/25</td>
                          <td>$112,000</td>
                        </tr>
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
