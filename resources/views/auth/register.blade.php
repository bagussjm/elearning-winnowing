<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>E-Question Sign Up</title>
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
                            <h5>Sign Up </h5>
                        </div>
                        <form class="form" method="POST" action="{{url('register')}}">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" value="{{old('name')}}" required autocomplete="name" autofocus>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                            </div>

                            <div class="input-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock-outline"></i></span>
                                </div>
                            </div>

                            <div class="input-group">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>

                            <div class="form-group" id="level">Status :
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="level" id="dosen" class="with-gap" value="dosen" checked="">
                                    <label for="dosen">Dosen</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="level" id="mahasiswa" class="with-gap" value="mahasiswa" >
                                    <label for="mahasiswa">Mahasiswa</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox" type="checkbox">
                                    <label for="checkbox">I have read and accept the termss</label>
                                </div>
                            </div>

                            <div class="footer">
                                <button class="btn btn-primary btn-round btn-block" type="submit" name="login">SIGN UP</button>
                            </div>


                        </form>
                    </div>
                    <a href="/login" class="link">Sudah Punya Akun? Login Disini</a>
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
