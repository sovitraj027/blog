

<head>
    <title>Register</title>
    @include('_includes._common_head')

</head>
<style>
    body {
        width: 100%;
        height: 100%;
        /* background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('assets/images/login.jpg'); */
        background-size: cover;
        background-position: center;

    }

    .container {

        padding: 10px;
        opacity: 0.9;
        filter: alpha(opacity=10);
    }
</style>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4 mt-4">
                                        <h5 class="text-primary">
                                            Welcome To Blog<br>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-5 align-self-center">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                        @if(isset($site_setting->imag)!=null)
                            <div>
                                <a href="#">
                                    <div class="avatar-md profile-user-wid mb-4 mx-auto d-block">
                                        <span class="avatar-title rounded-circle ">
                                            <img src="/storage/site-image/{{ $site_setting->image }}" alt="" class="" height="90">

                                        </span>
                                    </div>
                                </a>
                            </div>
                            @endif
                            <div class="p-2">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf 
                                    <div class="form-group">
                                        <label for="Name">{{ __('Name') }}</label>
                                    
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="enter name">
                                    
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }}</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="enter email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input id="userpassword" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Enter password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="userpassword">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password_confirmation" required autocomplete="current-password" placeholder="Enter password">
                                    
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">
                                            Register
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>