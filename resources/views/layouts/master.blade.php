<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <meta name="theme-name" content="mono" />
    <!-- GOOGLE FONTS -->
    @yield('css')
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/backend/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}" />
    <!-- FAVICON -->
    <link href="{{ asset('assets/backend/images/favicon.png') }}" rel="shortcut icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="shortcut icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <script src="{{ asset('assets/backend/plugins/nprogress/nprogress.js') }}"></script>

</head>

<body class="navbar-fixed sidebar-fixed" id="body">


    <div class="wrapper">

        {{-- ========= SIDE BAR S ========= --}}
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="/index.html">
                        <img src="{{ asset('assets/backend/images/logo.png') }}" alt="Mono">
                        <span class="brand-name">MONO</span>
                    </a>
                </div>

                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">

                        <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>


                        <li class="section-title">
                            Apps
                        </li>


                        <li class="has-sub {{ Route::is('category.index', 'category.create') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#category" aria-expanded="false" aria-controls="category">
                                <i class="mdi mdi-folder-multiple-outline"></i>

                                <span class="nav-text">CATEGORY</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="category" data-parent="#sidebar-menu">

                                <div class="sub-menu">

                                    <li class="{{ Route::is('category.index') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('category.index') }}">
                                            <span class="nav-text">CATEGORIES</span>

                                        </a>
                                    </li>

                                    <li class="{{ Route::is('category.create') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('category.create') }}">
                                            <span class="nav-text">CREATE CATEGORIES</span>

                                        </a>
                                    </li>

                                </div>

                            </ul>
                        </li>

                        <li class="has-sub {{ Route::is('tag.index', 'tag.create') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#tags" aria-expanded="false" aria-controls="tags">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">TAGS</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="tags" data-parent="#sidebar-menu">

                                <div class="sub-menu">

                                    <li class="{{ Route::is('tag.index') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('tag.index') }}">
                                            <span class="nav-text">ALL TAGS</span>

                                        </a>
                                    </li>

                                    <li class="{{ Route::is('tag.create') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('tag.create') }}">
                                            <span class="nav-text">CREATE TAGS</span>

                                        </a>
                                    </li>

                                </div>

                            </ul>
                        </li>

                        <li class="has-sub {{ Route::is('post.index', 'post.create') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#post" aria-expanded="false" aria-controls="post">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">POST</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="post" data-parent="#sidebar-menu">

                                <div class="sub-menu">

                                    <li class="{{ Route::is('post.index') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('post.index') }}">
                                            <span class="nav-text">ALL POSTS</span>

                                        </a>
                                    </li>

                                    <li class="{{ Route::is('post.create') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('post.create') }}">
                                            <span class="nav-text">CREATE POSTS</span>

                                        </a>
                                    </li>

                                </div>

                            </ul>
                        </li>

                        {{-- <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#charts" aria-expanded="false" aria-controls="charts">
                                <i class="mdi mdi-chart-pie"></i>
                                <span class="nav-text">Charts</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="charts" data-parent="#sidebar-menu">

                                <div class="sub-menu">

                                    <li>
                                        <a class="sidenav-item-link" href="apex-charts.html">
                                            <span class="nav-text">Apex Charts</span>

                                        </a>
                                    </li>

                                </div>

                            </ul>
                        </li> --}}

                    </ul>

                </div>
            </div>
        </aside>
        {{-- ========= SIDE BAR E ========= --}}


        {{-- ========= HEADER S ========= --}}
        <div class="page-wrapper">

            <header class="main-header" id="header">

                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">dashboard</span>

                    <div class="navbar-right ">

                        <!-- search form -->
                        <div class="search-form">
                            <form action="index.html" method="get">
                                <div class="input-group input-group-sm" id="input-group-search">
                                    <input type="text" autocomplete="off" name="query" id="search-input"
                                        class="form-control" placeholder="Search..." />
                                    <div class="input-group-append">
                                        <button class="btn" type="button">/</button>
                                    </div>
                                </div>
                            </form>

                            <ul class="dropdown-menu dropdown-menu-search">

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Morbi leo risus</a>
                                </li>

                            </ul>

                        </div>

                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    {{-- <img src="{{ asset('assets/backend/images/user/user-xs-01.jpg') }}"
                                        class="user-image rounded-circle" alt="User Image" /> --}}
                                    <span class="d-none d-lg-inline-block">{{ auth()->user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">

                                    <li>
                                        <a class="dropdown-link-item" href="user-profile.html">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a id="logout-button" class="dropdown-link-item"
                                                href="javascript:void(0)"> <i class="mdi mdi-logout"></i>
                                                Log
                                                Out </a>
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>

            {{-- ========= HEADER S ========= --}}


            {{-- ========= CONTENT S ========= --}}

            <div class="content-wrapper">
                <div class="content">
                    <!-- Top Statistics -->
                    <div class="row">
                        <div class="col-md-12 col-sm-6">

                            @yield('main')

                        </div>

                    </div>

                </div>

            </div>

            {{-- ========= CONTENT S ========= --}}


            {{-- ========= FOOTER S ========= --}}
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a
                            class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>
            {{-- ========= FOOTER E ========= --}}

        </div>


        <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/simplebar/simplebar.min.js') }}"></script>
        <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
        <script src="{{ asset('assets/backend/plugins/apexcharts/apexcharts.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="{{ asset('assets/backend/plugins/toaster/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/mono.js') }}"></script>
        <script src="{{ asset('assets/backend/js/chart.js') }}"></script>
        <script src="{{ asset('assets/backend/js/map.js') }}"></script>
        <script src="{{ asset('assets/backend/js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

        <script>
            $(document).ready(function() {

                $('#logout-button').click(function() {

                    $('#logout-form').submit();
                });

            });
        </script>

        @yield('js')

        <!--  -->
</body>

</html>
