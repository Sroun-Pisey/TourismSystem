<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
@import url('https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&display=swap');
body{
    font-family: "Battambang", system-ui;
}
</style>

</head>
<body>

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="/home"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <!-- Home -->
                        <li class="{{ Request::is('home') ? 'active' : '' }}">
                            <a title="Landing Page" href="/home" aria-expanded="false">
                                <i class="fa-solid fa-house"></i>
                                <span class="mini-click-non">ទំព័រដើម</span>
                            </a>
                        </li>

                        <!-- Authors -->
                        <li class="{{ Request::is('customers*') ? 'active' : '' }}">
                            <a class="has-arrow" href="#">
                                <i class="fa-solid fa-users"></i>
                                <span class="mini-click-non">អ្នកនិពន្ធ</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="{{ Request::is('customers*') ? 'true' : 'false' }}">
                                <li>
                                    <a href="{{ route('customers.create') }}">
                                        <span class="mini-sub-pro"><i class="fa-solid fa-caret-right"></i> បន្ថែមអ្នកនិពន្ធ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customers.index') }}">
                                        <span class="mini-sub-pro"><i class="fa-solid fa-caret-right"></i> បញ្ជីអ្នកនិពន្ធ</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Posts -->
                        <li class="{{ Request::is('categories*') || Request::is('posts*') ? 'active' : '' }}">
                            <a class="has-arrow" href="#">
                                <i class="fa-solid fa-users"></i>
                                <span class="mini-click-non">ផ្សាយអត្ថបទ</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="{{ Request::is('categories*') || Request::is('posts*') ? 'true' : 'false' }}">
                                <li>
                                    <a href="{{ route('categories.index') }}">
                                        <span class="mini-sub-pro"><i class="fa-solid fa-caret-right"></i> ប្រភេទអត្ថបទ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('posts.index') }}">
                                        <span class="mini-sub-pro"><i class="fa-solid fa-caret-right"></i> ផ្សាយអត្ថបទ</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row" style="padding-top: 20px;">
                    @yield('content')
                </div>
            </div>
        </div>


    </div>






    <!-- jquery
		============================================ -->
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('js/morrisjs/morris-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{asset('js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('js/calendar/fullcalendar-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





</body>
</html>
