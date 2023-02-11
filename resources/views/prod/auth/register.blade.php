@include('layout.html-head')
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ url('register') }}" method="POST">
              @csrf
              <h1>Create Account</h1>

              <div class="row">
                <div class="col-sm-6">
                  @error('first_name')<small><span class="error text-danger text-left d-block">{{$message}}</span></small>@enderror
                  <input type="text" name="first_name" class="form-control @error('first_name') parsley-error border border-danger @enderror" placeholder="First Name" value="{{ old('first_name') }}"/>
                </div>

                <div class="col-sm-6">
                  @error('last_name')<small><span class="error text-danger text-left d-block">{{$message}}</span></small>@enderror
                  <input type="text" name="last_name" class="form-control @error('last_name') parsley-error border border-danger @enderror" placeholder="Last Name" value="{{ old('last_name') }}"/>
                </div>
              </div>

              <div>
                @error('email')<small><span class="error text-danger text-left d-block">{{$message}}</span></small>@enderror
                <input type="email" name="email" class="form-control @error('email') parsley-error border border-danger @enderror" placeholder="Email" value="{{ old('email') }}" />
              </div>

              <div>
                @error('password')<small><span class="error text-danger text-left d-block">{{$message}}</span></small>@enderror
                <input type="password" name="password" class="form-control @error('password') parsley-error border border-danger @enderror" placeholder="Password" />
              </div>

              <div>
                @error('conf_password')<small><span class="error text-danger text-left d-block">{{$message}}</span></small>@enderror
                <input type="password" name="conf_password" class="form-control @error('conf_password') parsley-error border border-danger @enderror" placeholder="Confirm Password" />
              </div>

              <div>
                <input type="submit" value="Submit" style="width: 150px;"/>
              </div>
              <input type="hidden" name="role"/>
              <input type="hidden" name="status" />

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member?
                  <a href="{{ url('login') }}" class="to_register"> Login </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> OFFICE!</h1>
                  <p>©2022 All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
