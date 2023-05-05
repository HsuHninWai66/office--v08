@include('layout.html-head')
@include('layout.sidebar-header')
@include('layout.side-bar')
@include('layout.top-nav')

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
            <h3 class="ml-3" style="color:#3f51b5;">Employee's Detail View</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
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
        <div class="col-md-12 profile_details">
          <div class="x_panel">

            <div class="x_content profile_view">

              <div class="col-md-6 col-sm-6">

                <ul class="stats-overview">
                  <li>
                    <span class="name"> Start Employ From </span>
                    <span class="value text-success"> {{ $staffDetail['em_start_date'] }}</span>
                  </li>
                  <li>
                    <span class="name"> Experience Year </span>
                    <span class="value text-success"> {{ $staffDetail['experience_yr'] }} </span>
                  </li>
                  <li>
                    <span class="name"> Position </span>
                    <span class="value text-success"> {{ $staffDetail['role'] }} </span>
                  </li>
                </ul>
                <br />

                <div class="right col-md-12 col-sm-12 text-center">
                    <img src="{!! asset('/uploads/staff/'.$staffDetail['profile_img']) !!}" alt="" width="230px;" style="border:1px solid gray;padding:5px;">
                </div>

                <div>

                  <h4>Bank Information</h4>

                  <!-- end of user messages -->
                  <ul class="messages">
                    <li>
                      <div class="message_wrapper">
                        <h4 class="heading">KBZ Bank</h4>
                        <blockquote class="message">@if (isset($staffDetail['kbz_bank_acc'])) {{ $staffDetail['kbz_bank_acc'] }} @else No data @endif</blockquote>
                      </div>
                    </li>
                    <li>
                      <div class="message_wrapper">
                        <h4 class="heading">KBZ Pay Number</h4>
                        <blockquote class="message">@if (isset($staffDetail['kbz_pay'])) {{ $staffDetail['kbz_pay'] }} @else No data @endif</blockquote>
                      </div>
                    </li>
                    <li>
                      <div class="message_wrapper">
                        <h4 class="heading">Aya Bank</h4>
                        <blockquote class="message">@if (isset($staffDetail['aya_bank'])) {{ $staffDetail['aya_bank'] }} @else No data @endif</blockquote>
                      </div>
                    </li>
                    <li>
                        <div class="message_wrapper">
                          <h4 class="heading">Yoma Bank</h4>
                          <blockquote class="message">@if (isset($staffDetail['yoma_bank'])) {{ $staffDetail['yoma_bank'] }} @else No data @endif</blockquote>
                        </div>
                    </li>
                    <li>
                        <div class="message_wrapper">
                          <h4 class="heading">Wave Money</h4>
                          <blockquote class="message">@if (isset($staffDetail['wave_money_number'])) {{ $staffDetail['wave_money_number'] }} @else No data @endif</blockquote>
                        </div>
                      </li>
                  </ul>
                  <!-- end of user messages -->


                </div>


              </div>

              <!-- start project-detail sidebar -->
              <div class="col-md-6 col-sm-6">

                <section class="panel">

                  <div class="x_title p-3">
                    <h2>Staff's Personal Detail</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="panel-body">
                    <h3 class="green"> {{ $staffDetail['first_name'] }} {{ $staffDetail['last_name'] }}</h3>

                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                    <br />

                    <div class="project_detail">

                      <p class="title" style="font-size:1.3em;">Gender</p>
                      <p>{{ $staffDetail['gender'] }}</p>

                      <p class="title" style="font-size:1.3em;">Office Department</p>
                      <p>{{ $staffDetail['dept'] }}</p>

                      <p class="title" style="font-size:1.3em;">Office Time</p>
                      <p>{{ $staffDetail['office_time'] }}</p>
                    </div>

                    <br />
                    <h5>Contact Information</h5>
                    <ul class="list-unstyled project_files">
                      <li><i class="fa fa-phone-square pr-2"></i> {{ $staffDetail['phone_number'] }}
                      </li>
                      <li><i class="fa fa-mail-reply pr-2"></i> {{ $staffDetail['email'] }}
                      </li>
                      <li><i class="fa fa-home pr-2"></i>{{ $staffDetail['address'] }}
                      </li>
                      <li><i class="fa fa-book pr-2"></i>{{ $staffDetail['remark'] }}
                      </li>
                    </ul>
                    <br />

                    <div class="text-center mtop20">
                      <a href="{{ url('staff/edit/' . $staffDetail->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                      <a href="{{ url('staff/list') }}" class="btn btn-sm btn-warning">Go to Lists</a>
                    </div>
                  </div>

                </section>

              </div>
              <!-- end project-detail sidebar -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

@include('layout.footer')

