<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" style="text-transform:uppercase;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{!! asset('images/my-pf.jpg') !!}" alt="" >{{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="javascript:;"> Profile</a>
              <a class="dropdown-item"  href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
          <a class="dropdown-item"  href="javascript:;">Help</a>
            <a class="dropdown-item"  href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </div>
        </li>

        <script type="text/javascript" charset="utf-8">
          let a;
          let time;
          setInterval(() => {
          a = new Date();
          time = a.getHours() + ':' + a.getMinutes() + ':' + a.getSeconds();
          document.getElementById('liveTime').innerHTML = time;
          }, 1000);
       </script>

        <li role="presentation" class="nav-item" style="padding-left: 5px;"><span id="liveTime"></span></li>
        <li><i class="fa fa-clock-o"></i></li>
   
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->