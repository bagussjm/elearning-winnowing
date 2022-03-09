<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>E-Question Forgot Password</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/asset/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="/asset/css/main.css">
    <link rel="stylesheet" href="/asset/css/color_skins.css">
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
                            <h5>Forgot Password? </h5>
                            <span>Enter your e-mail address below to reset your password.</span>
                        </div>
                        <form class="form" method="POST" action="{{route('forgot_password')}}">
                            @csrf
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Enter Email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                            </div>

                        </form>
                        <div class="footer">
                            <a href="index.html" class="btn btn-primary btn-round btn-block">SUBMIT</a>                            
                        </div>

                    </div>
                    <a href="/login" class="link">Sudah Ingat Akun Kamu? Login Disini</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Jquery Core Js -->
<script src="/asset/bundles/libscripts.bundle.js"></script>
<script src="/asset/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>

</html>
