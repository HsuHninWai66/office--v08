@include('layout.html-head')

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('passwordReset',['id'=>$data['id']]) }}" method="POST">
                        @csrf
                        @if (session('success'))
                        <h1>{{ session('success') }}</h1>
                        @else
                        <h1 class="text-centet">Reset Your Password</h1>
                        @endif
                        <div class="text-left" style="padding: 20px;">
                            <h6>Enter your new password below.</h6>
                        </div>

                        <div>
                            @error('password')<small><span class="error text-danger text-left d-block">{{$message}}</span></small>@enderror
                            <input type="password" name="password" class="form-control @error('password') parsley-error border border-danger @enderror" placeholder="Password" />
                        </div>

                        <div>
                            @error('password')<small><span class="error text-danger text-left d-block">{{$message}}</span></small>@enderror
                            <input type="password" name="conf_password" class="form-control @error('conf_password') parsley-error border border-danger @enderror" placeholder="Confirm Password" />
                        </div>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <input type="submit" value="Resend again!" style="width:150px;">
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
