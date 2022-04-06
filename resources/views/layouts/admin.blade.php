<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
   
    <link rel="stylesheet" href={{asset('../admin/plugins/bootstrap/dist/css/bootstrap.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/fontawesome-free/css/all.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/icon-kit/dist/css/iconkit.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/ionicons/dist/css/ionicons.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/jvectormap/jquery-jvectormap.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/weather-icons/css/weather-icons.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/c3/c3.min.css')}}>
    <link rel="stylesheet" href={{asset('./admin/plugins/owl.carousel/dist/assets/owl.carousel.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/plugins/owl.carousel/dist/assets/owl.theme.default.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/dist/css/theme.min.css')}}>
    <link rel="stylesheet" href={{asset('../admin/dist/css/main.css')}}>
    <script src={{asset('../admin/src/js/vendor/modernizr-2.8.3.min.js')}}></script>
</head>

<body>
    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="ik ik-power dropdown-icon"></i>
                            Logout</a>
                    </div>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </header>
        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="{{ asset('admin/dashboard') }}">
                        <span class="text">Admin Panel</span>
                    </a>
                </div>
                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div class="nav-item {{ \Request::is('*users*') ? 'active' : '' }}">
                                <a href="{{ asset('admin/users') }}"><i class="ik ik-users"></i><span>Les utilisateurs</span></a>
                            </div>

                            <div class="nav-item {{ \Request::is('*faculte*') ? 'active' : '' }}">
                                <a href="{{ asset('admin/faculte') }}"><i class="ik ik-edit"></i><span>Les facultés</span></a>
                            </div>

                            <div class="nav-item {{ \Request::is('*events*') ? 'active' : '' }}">
                                <a href="{{ asset('admin/events') }}"><i class="ik ik-bar-chart"></i><span>Evénemment</span></a>
                            </div>

                            <div class="nav-item {{ \Request::is('*contact*') ? 'active' : '' }}">
                                <a href="{{ asset('contact') }}"><i class="ik ik-eye"></i><span>support message</span></a>
                            </div>

                            <div class="nav-item {{ \Request::is('*sponsorsimg*') ? 'active' : '' }}">
                                <a href="{{ asset('admin/sponsorsimg  ') }}"><i class="ik ik-eye"></i><span>Sponsor img</span></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block">Copyright © 2022  All Rights
                        Reserved.</span>
                </div>
            </footer>

        </div>
    </div>

    <script src="../admin/https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="admin/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="../admin/plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../admin/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="../admin/plugins/screenfull/dist/screenfull.js"></script>
    <script src="../admin/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../admin/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../admin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../admin/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="../admin/plugins/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../admin/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../admin/plugins/moment/moment.js"></script>
    <script src="../admin/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../admin/plugins/d3/dist/d3.min.js"></script>
    <script src="../admin/plugins/c3/c3.min.js"></script>
    <script src="../admin/js/tables.js"></script>
    <script src="../admin/js/main.js"></script>
    <script src="../admin/js/widgets.js"></script>
    <script src="../admin/js/charts.js"></script>
    <script src="../admin/dist/js/theme.min.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
</body>

</html>
