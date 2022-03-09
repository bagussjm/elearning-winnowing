<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>E-Question Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('/') }}/asset/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ url('/') }}/asset/css/main.css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/css/color_skins.css">
</head>
<body class="theme-black">
<div class="authentication">
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="company_detail">
                        <h4 class="logo"><img src="{{asset('asset/images/logo.svg')}}" alt=""> E-Question</h4>
                        <h3>Welcome to E-Question</h3>
                        <p>Equestion is a question and answer forum based on e-learning</p>
                        <div class="footer">

                            <hr>
                            <ul>
                                <li><a href="http://thememakker.com/contact/" target="_blank">Contact Us</a></li>
                                <li><a href="http://thememakker.com/about/" target="_blank">About Us</a></li>
                                <li><a href="http://thememakker.com/services/" target="_blank">Services</a></li>
                                <li><a href="javascript:void(0);">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 offset-lg-1">
                    <div class="card-plain">
                        <div class="header">
                            <h5>Login to E-Question</h5>
                        </div>
                        <form class="form" method="POST" action="{{route('login')}}">
                            @csrf

                            <div>
                                @if(session('sukses_logout'))
                                    <div class="alert alert-info" role="alert">
                                        {{session('sukses_logout')}}
                                    </div>
                                @endif
                            </div>

                            <div>
                                @if(session('sukses_register'))
                                    <div class="alert alert-info" role="alert">
                                        {{session('sukses_register')}}
                                    </div>
                                @endif
                            </div>

                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" id="myInput">
                                <div class="input-group-append">
                                    <span class="input-group-text"><input type="checkbox" onclick="myFunction()"></span>

                                </div>
                            </div>



                            @if(session('sukses'))
                            <div class="alert alert-danger" role="alert">
                                <div class="container">
                                    <div class="alert-icon">
                                        <i class="material-icons">error_outline</i>
                                    </div>
                                    {{session('sukses')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">
                                        <i class="zmdi zmdi-close"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            @endif

                            <div class="footer">
                                <button class="btn btn-primary btn-round btn-block" type="submit" name="login">SIGN IN</button>
                            </div>
                        </form>
                        <a href="/register" class="btn btn-primary btn-simple btn-round btn-block">SIGN UP</a>
                    </div>
                    <a href="/forgot_password" class="link">Lupa Password?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Jquery Core Js -->
<script src="{{ url('/') }}/asset/bundles/libscripts.bundle.js"></script>
<script src="{{ url('/') }}/asset/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</body>

</html>
