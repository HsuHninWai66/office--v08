<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li class="{{ (Request::path()==('dashboard') ? 'active' : '') }}"><a href="@if(Auth::user()->role == 'Manager'){{ url('manager/dashboard') }}@else{{ url('staff/dashboard') }}@endif"><i class="fa fa-home"></i> Dashboard </a></li>

      <li><a><i class="fa fa-users"></i> Staff Management <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ url('department') }}"><i class="fa fa-building-o"></i>Department</a></li>
          <li><a href="{{ url('position') }}"><i class="fa fa-asterisk"></i>Position</a></li>
          <li><a href="{{ url('staff/list') }}"><i class="fa fa-female"></i>Staff</a></li>
        </ul>
      </li>

      @if(Auth::user()->role == 'Manager')

      <li><a><i class="fa fa-book"></i> Annual Leave <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="#"><i class="fa fa-database"></i>List</a></li>
          <li><a href="#"><i class="fa fa-plus"></i>Add</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-calendar"></i> Absence <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="#"><i class="fa fa-database"></i>List</a></li>
          <li><a href="#"><i class="fa fa-plus"></i>Add</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-clone"></i> Timecard Management <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="#">Lists</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-money"></i> General Cost <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="#">Lists</a></li>
        </ul>
      </li>


      <li><a><i class="fa fa-user"></i> Admin <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ url('profile/list') }}"><i class="fa fa-database"></i>Lists</a></li>
          <li><a href="{{ url('profile/add') }}"><i class="fa fa-plus"></i>Add</a></li>
        </ul>
      </li>

      <li><a><i class="fa fa-envelope"></i> Mail Templates <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ url('maileclipse/mailables') }}"><i class="fa fa-envelope-o"></i>Mailables</a></li>
          <li><a href="{{ url('maileclipse/templates') }}"><i class="fa fa-sliders"></i>Templates</a></li>
        </ul>
      </li>
      @endif
    </ul>
  </div>

</div>
<!-- /sidebar menu -->
 <!-- /menu footer buttons -->
 <div class="sidebar-footer hidden-small">
  <img src="{!! asset('images/footer-fix-2.png') !!}" alt="" width="50%">
</div>
<!-- /menu footer buttons -->
</div>
</div>
