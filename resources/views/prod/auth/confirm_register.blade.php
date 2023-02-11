@include('layout.html-head')

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('registerConfirm') }}" method="POST">
              @csrf
              <h1>Create Account</h1>

              <div class="text-left" style="padding: 20px;">
                Full Name : <b>{{ $userData['first_name']}} {{ $userData['last_name'] }}</b>
                <input type="hidden" name="first_name" class="form-control" value="{{ $userData['first_name'] }}" placeholder="Name" />
                <input type="hidden" name="last_name" class="form-control" value="{{ $userData['last_name'] }}" placeholder="Name" />
              </div>
              <div class="text-left" style="padding: 20px;">
                Email : <b>{{ $userData['email'] }}</b>
                <input type="hidden" name="email" class="form-control" value="{{ $userData['email'] }}" />
              </div>

              <div class="text-left" style="padding: 20px;">
                Password : <b>********</b>
                <input type="hidden" name="password" class="form-control" value="{{ $userData['password'] }}" />
              </div>
              <input type="hidden" name="role" value="{{ $userData['role'] }}"/>
              <input type="hidden" name="status" value="{{ $userData['status'] }}"/>
              <div class="clearfix"></div>

              <div class="separator">
                  <input type="submit" value="Confirm" style="width:150px;">
                  <input type="button" value="Back" style="width:150px;display: block;margin: 10px auto;background-image: none;padding: 5px;border: 2px solid #d5d5d5;" onclick="history.go(-1)">
                  <p class="change_link" style="padding: 10px;"><a href="{{ url('login') }}">Already a member?</a>
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
