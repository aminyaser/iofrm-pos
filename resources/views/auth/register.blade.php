<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm | Login</title>
    <link rel="stylesheet" type="text/css" href="{{url('dashboard_files/loginstyle/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('dashboard_files/loginstyle/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('dashboard_files/loginstyle/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('dashboard_files/loginstyle/css/iofrm-theme9.css')}}">
</head>

<body>
    <div class="form-body" class="container-fluid">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Get more things done with io.frm</h3>
                    <p>Access to the most powerfull tool in the entire design and web industry.</p>
                    <img src="{{url('dashboard_files/loginstyle/images/graphic5.svg')}}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="{{url('/')}}">
                                    <div class="logo">
                                        <img class="logo-size" src="{{url('dashboard_files/loginstyle/images/logo-light.svg')}}" alt="">
                                    </div>
                                </a>
                            </div>
                        <div class="page-links">
                            <a href="{{ url('/login') }}">Login</a><a href="{{ url('/register') }}" class="active">Register</a>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="first_name" placeholder="first name" required>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="last_name" placeholder="first name" required>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <input id="password-confirm" class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation" placeholder="password_confirmation" required>

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{url('dashboard_files/loginstyle/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('dashboard_files/loginstyle/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{url('dashboard_files/loginstyle/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('dashboard_files/loginstyle/js/main.js')}}"></script>
</body>

</html>
