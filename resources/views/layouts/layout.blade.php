<!doctype html>
<html lang="en">
<head>
    <title>메가골드</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- scripts  -->

    <!-- Material Kit CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/paper-dashboard.css?v=2.0.0')}}" rel="stylesheet" />

</head>
<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="../assets/img/logo-small.png">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="https://www.creative-tim.com" class="simple-text logo-normal">
                고사장
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active" id="dashboard">
                    <a href="{{url('/')}}">
                        <i class="nc-icon nc-bank"></i>
                        <p>대시보드</p>
                    </a>
                </li>
                <li id="product">
                    <a href="{{url('/product')}}">
                        <i class="nc-icon nc-diamond"></i>
                            <p>상품</p>
                    </a>
                </li>
                <li id="order">
                    <a href="{{url('/order')}}">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>주문</p>
                    </a>
                </li>
                <li id="sales">
                    <a href="{{url('/sales')}}">
                        <i class="nc-icon nc-money-coins"></i>
                        <p>매출</p>
                    </a>
                </li>
                <li id="notification">
                    <a href="{{url('/notification')}}">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>알림</p>
                    </a>
                </li>
                <li id="info">
                    <a href="{{url('/info')}}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>개인정보</p>
                    </a>
                </li>

{{--                <li>--}}
{{--                    <a href="./typography.html">--}}
{{--                        <i class="nc-icon nc-caps-small"></i>--}}
{{--                        <p>Typography</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="active-pro">--}}
{{--                    <a href="./upgrade.html">--}}
{{--                        <i class="nc-icon nc-spaceship"></i>--}}
{{--                        <p>Upgrade to PRO</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="javascript:;"></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="검색">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify" href="javascript:;">
                                <i class="nc-icon nc-layout-11"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-settings-gear-65"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">로그아웃</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        @yield('content')

        <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                            <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                            <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
                        </ul>
                    </nav>
                    <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/popup/popup.js')}}" type="text/javascript"></script>

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('assets/js/plugins/bootstrap-switch.js')}}" type="text/javascript"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}" type="text/javascript"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Chart JS -->
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}" type="text/javascript"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}" type="text/javascript"></script>

<!-- Control Center for Paper Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/plugins/paper-dashboard.js?v=2.0.0')}}" type="text/javascript"></script>
<script>
    var url = (window.location.href).split('/');
    var getId = document.getElementById(url[3]) ?? null;
    var getList = document.getElementsByClassName("nav")[0].children;
    console.log(getId);
    Object.keys(getList).forEach(function(i){
        if(getList[i].id == getId.id){
            getList[i].classList.add("active");
        }else{
            getList[i].classList.remove("active");
        }
    })
</script>
</body>
</html>