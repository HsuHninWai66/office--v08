@include('layout.html-head')
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('recoveryPassword') }}" method="POST">
              @csrf
              <h1>Forgot Password </h1>
              <p>Please enter your email to sent recovery mail.</p>
              @if (session('noUser'))
              <div class="alert alert-danger show mb-0" role="alert" style="margin-bottom: 10px !important;background: rgba(231,76,60,0.1);border: none;color: rgba(231,76,60,0.88);border: 1px solid rgba(231,76,60,0.88);">
                  {{session('noUser')}}
                </div>
              @endif
              <div>
                @error('email')<span class="error text-danger text-left d-block">{{$message}}</span>@enderror
                <input type="text" class="form-control @error('email') parsley-error border border-danger @enderror" placeholder="Username or email" name="email" value="{{ old('email') }}" />
              </div>

              <div>
                <input type="submit" value="Submit" style="width: 150px;"/>
              </div>

              <div class="clearfix"></div>

              <div class="separator mt-4">
               <div class="d-flex justify-content-between">
                 <div>
                 <p class="change_link">
                  <a href="{{ url('register') }}" class="to_register">Don't have an account? </a>
                </p>

                 </div>
                 <div>
                 <a href="{{ url('register') }}" class="to_register"> Forgot password? </a>
                 </div>
               </div>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Welcome to our OFFICE!</h1>
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
