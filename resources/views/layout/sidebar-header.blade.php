<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw text-gradiant"></i> <span class="text-gradiant">OFFICE!</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{!! asset('images/my-pf.jpg') !!}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span class="text-gradiant">Welcome,</span>
              <h2 style="color: #343a78;text-transform:uppercase;">{{ Auth::user()->name }}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />