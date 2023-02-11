@include('layout.html-head')

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('resentEmail',['id'=>$data['id']]) }}" method="POST">
                        @csrf
                        @if (session('success'))
                        <h1>{{ session('success') }}</h1>
                        @else
                        <h1>Email Verification</h1>
                        @endif
                        <div class="text-left" style="padding: 20px;">
                            <h6>To continue using Office, please verify your email address that we sent to:</h6>
                            <h5 class="text-center">{{ $data['email'] }}</h5>
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
