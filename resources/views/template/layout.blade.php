<!doctype html>
<div class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>E-Learning</title>
<link rel="shortcut icon" type="image/x-icon" href="/asset/images/uin-suska.png" >
<link rel="stylesheet" href="{{ url('/') }}/asset/plugins/bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="{{ asset('/') }}asset/plugins/morrisjs/morris.css" / -->
<link rel="stylesheet" href="{{ url('/') }}/asset/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{ url('/') }}/asset/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="{{ url('/') }}/asset/css/main.css">
<link rel="stylesheet" href="{{ url('/') }}/asset/css/color_skins.css">
</head>
<body class="theme-black">
<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="/asset/images/logo.svg" width="48" height="48" alt="Alpino"></div>
        <p>Please wait...</p>
    </div>
</div> -->
<!-- Page Loader -->
<div class="overlay_menu">
    <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>
    <div class="container">


    </div>
</div>
<div class="overlay"></div><!-- Overlay For Sidebars -->

<!-- Left Sidebar -->
<aside id="minileftbar" class="minileftbar">
    <ul class="menu_list">
        <li>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{ url('/') }}/asset/images/logo.svg" alt="Alpino"></a>
        </li>
        <li><a href="javascript:void(0);" class="fullscreen" data-provide="fullscreen"><i class="zmdi zmdi-fullscreen"></i></a></li>
        <li class="power">
            <!-- <a href="javascript:void(0);" class="js-right-sidebar"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a> -->
            <a href="{{route('logout')}}" onclick="return confirm('Yakin  keluar ?')" class="mega-menu"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>
</aside>

<aside class="right_menu">
    <div class="menu-app">
        <div class="slim_scroll">
            <div class="card">
                <div class="header">
                    <h2><strong>App</strong> Menu</h2>
                </div>
                <div class="body">
                    <ul class="list-unstyled menu">
                        <li><a href="events.html"><i class="zmdi zmdi-calendar-note"></i><span>Calendar</span></a></li>
                        <li><a href="file-dashboard.html"><i class="zmdi zmdi-file-text"></i><span>File Manager</span></a></li>
                        <li><a href="blog-dashboard.html"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a></li>
                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-arrows"></i><span>Notes</span></a></li>
                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-view-column"></i><span>Taskboard</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting">Setting</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activity">Activity</a></li>
        </ul>
        <div class="tab-content slim_scroll">
            <div class="tab-pane slideRight active" id="setting">
                <div class="card">
                    <div class="header">
                        <h2><strong>Colors</strong> Skins</h2>
                    </div>
                    <div class="body">
                        <ul class="choose-skin list-unstyled m-b-0">
                            <li data-theme="black" class="active">
                                <div class="black"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>General</strong> Settings</h2>
                    </div>
                    <div class="body">
                        <ul class="setting-list list-unstyled m-b-0">
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">Report Panel Usage</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox2" type="checkbox" checked="">
                                    <label for="checkbox2">Email Redirect</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">Notifications</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">Auto Updates</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox5" type="checkbox" checked="">
                                    <label for="checkbox5">Offline</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox m-b-0">
                                    <input id="checkbox6" type="checkbox">
                                    <label for="checkbox6">Location Permission</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Left</strong> Menu</h2>
                    </div>
                    <div class="body theme-light-dark">
                        <button class="t-dark btn btn-primary btn-round btn-block">Dark</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info m-b-20">
                        <div class="image">
                            <a href="/profile"><img src="{{ url('/') }}/foto_profile/{{(Auth::user()->foto)}}" alt="User"></a>
                        </div>
                        <div class="detail">
                            <h6>{{Auth::user()->name}}</h6>
                            <p class="m-b-0">{{Auth::user()->email}}</p>
                            <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-facebook-box"></i></a>
                            <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-linkedin-box"></i></a>
                            <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-instagram"></i></a>
                            <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-twitter-box"></i></a>
                        </div>
                    </div>
                </li>
                <li class="header">MENU</li>
                 <!-- class="active open" -->
                <li> <a href="{{ url('/') }}/dashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                <li> <a href="{{ url('/') }}/kelas"><i class="zmdi zmdi-widgets"></i><span>Kelas</span></a></li>


{{--                <li><a class="menu-toggle"><i class="zmdi zmdi-help-outline"></i><span>Question</span> <span class="badge badge-success float-right">2</span></a>--}}
{{--                    <ul class="ml-menu">--}}
{{--                        <li><a href="mail-inbox.html">Question</a></li>--}}
{{--                        <li><a href="mail-inbox.html">My Question</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-comment-alt-text"></i><span>Answers</span> <span class="badge badge-success float-right">1</span></a>--}}
{{--                    <ul class="ml-menu">--}}
{{--                        <li><a href="mail-inbox.html">My Answers</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

                <?php if (Auth::user()->level == 'admin'): ?>
                <li> <a href="{{ url('/') }}/user"><i class="zmdi zmdi-accounts"></i><span>Pengguna</span></a></li>
                <?php endif ?>
                <li>
                    <a href="{{ url('/') }}/logout"><i class="material-icons">power_settings_new</i><span>Logout</span></a>
                </li>


            </ul>
        </div>
    </div>
</aside>

<!-- Main Content -->
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2><b>{{$breadcumb}}</b></h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><i class="zmdi zmdi-home"></i></li>
                        <li class="breadcrumb-item active">{{$breadcumb}}</li>
                    </ul>
                </div>
                <!-- <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="isi">




        @yield('content')




        </div>

    </div>

</section>
<!-- Jquery Core Js -->
<script src="{{ url('/')  }}/asset/js/pages/jquery-3.6.0.min.js"></script>
<script src="{{ url('/')  }}/asset/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{ url('/')  }}/asset/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{ url('/')  }}/asset/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
<script src="{{ url('/')  }}/asset/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ url('/')  }}/asset/bundles/morrisscripts.bundle.js"></script> <!-- Morris Plugin Js -->
<script src="{{ url('/')  }}/asset/bundles/sparkline.bundle.js"></script> <!-- sparkline Plugin Js -->
<script src="{{ url('/')  }}/asset/bundles/doughnut.bundle.js"></script>

<script src="{{ url('/')  }}/asset/bundles/mainscripts.bundle.js"></script>
<script src="{{ url('/')  }}/asset/js/pages/index.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ url('/')  }}/asset/bundles/datatablescripts.bundle.js"></script>
<script src="{{ url('/')  }}/asset/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{ url('/')  }}/asset/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/')  }}/asset/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{ url('/')  }}/asset/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="{{ url('/')  }}/asset/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{ url('/')  }}/asset/js/pages/moment.js"></script>
<script src="{{ url('/')  }}/asset/js/pages/timer.js"></script>



<script src="{{ url('/')  }}/asset/js/pages/tables/jquery-datatable.js"></script>
</body>

<!-- MODAL -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Buat Kelas</h4>
            </div>
            <div class="modal-body">
                <form action="kelas/create" method="POST"  }}>
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" name="nama_kelas" placeholder="Masukkan nama kelas" class="form-control">
                        <label for="">Kode Kelas</label>
                        <input type="text" name="kode_kelas" value="{{str_random(5)}}" class="form-control" readonly>
                    </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">TUTUP</button>
                <button type="submit" class="btn btn-primary btn-round waves-effect">SIMPAN</button>
            </div>
                </form>
        </div>
    </div>
    </div>
</div>
<!-- ENDMODAL -->

    <!-- MODAL -->
    <div class="modal fade" id="ModalIkutKelas" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Ikuti Kelas</h4>
                </div>
                <div class="modal-body">
                    <form action="kelas/ikuti" method="POST"  }}>
                        {{csrf_field()}}

                        <div class="form-group">
{{--                            <label for="">Masukkan Kode Kelas</label>--}}
                            <input type="text" name="kode_kelas" placeholder="Masukkan Kode Kelas"  class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">TUTUP</button>
                            <button type="submit" class="btn btn-info btn-round waves-effect"><i class="material-icons">input</i> Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ENDMODAL -->

    <!-- MODAL FOTO PROFILE -->
    <div class="modal video-modal fade" id="myModalphoto" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Ganti Photo
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <section>
                    <form action="/profile/upload" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="file" name="foto">
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <input type="submit" name="foto" value="Save Changes" class="btn btn-info">
                        </div>
                    </form>
            </section>
        </div>
    </div>
    <!-- END MODAL FOTO PROFILE-->

    </div>
</div>
</html>
</html>

