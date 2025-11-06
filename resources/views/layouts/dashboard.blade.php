<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="tutorial app" name="description" />
    <meta content="MArslan" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Plugins css -->
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="{{ asset('assets/js/head.js') }}"></script>
    @stack('styles')
</head>

<!-- body start -->

<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed"
    data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="d-none d-lg-block">
                        <form class="app-search">
                            <div class="app-search-box dropdown">
                                <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h5 class="text-overflow mb-2">Found 22 results</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-home me-1"></i>
                                        <span>Analytics Report</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-aperture me-1"></i>
                                        <span>How can I help you?</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>User profile settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle"
                                                    src="assets/images/users/user-2.jpg" alt="Generic placeholder image"
                                                    height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                    <span class="font-12 mb-0">UI Designer</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle"
                                                    src="assets/images/users/user-5.jpg" alt="Generic placeholder image"
                                                    height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Jacob Deo</h5>
                                                    <span class="font-12 mb-0">Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                            data-toggle="fullscreen" href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-end">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="noti-scroll" data-simplebar>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon">
                                        <img src="assets/images/users/user-1.jpg" class="img-fluid rounded-circle"
                                            alt="" />
                                    </div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="assets/images/users/user-4.jpg" class="img-fluid rounded-circle"
                                            alt="" />
                                    </div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="text-muted">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-secondary">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                                class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fe-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ms-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Password Settings</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" 
                                   class="dropdown-item notify-item"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                            </form>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ route('dashboard') }}" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
                        </span>
                    </a>

                    <a href="{{ route('dashboard') }}" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                            data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                @auth
                    <div class="user-box text-center">
                        <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" 
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                                    <i class="fe-user me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" 
                                       class="dropdown-item notify-item"
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="fe-log-out me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </form>

                            </div>
                        </div>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                    </div>
                @endauth

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">
                        <li>
                            <a href="{{ route('dashboard') }}" 
                               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('home') }}" 
                               class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                <i class="mdi mdi-book-open-variant"></i>
                                <span>Browse Tutorials</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('tutorials.create') }}" 
                               class="{{ request()->routeIs('tutorials.create') ? 'active' : '' }}">
                                <i class="mdi mdi-plus-circle"></i>
                                <span>Create Tutorial</span>
                            </a>
                        </li>

                        <li>
                            <a href="#sidebarTutorials" data-bs-toggle="collapse" 
                               class="{{ request()->routeIs('tutorials.*') && !request()->routeIs('tutorials.create') ? 'active' : '' }}">
                                <i class="mdi mdi-file-document-outline"></i>
                                <span>Tutorials</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse {{ request()->routeIs('tutorials.*') && !request()->routeIs('tutorials.create') ? 'show' : '' }}" id="sidebarTutorials">
                                <ul class="nav-second-level">
                                    @php
                                        $myTutorials = \App\Models\Tutorial::where('user_id', auth()->id())
                                            ->latest()
                                            ->limit(10)
                                            ->get();
                                    @endphp
                                    @if($myTutorials->count() > 0)
                                        @foreach($myTutorials as $tutorial)
                                            <li>
                                                <a href="{{ route('tutorials.edit', ['tutorial' => $tutorial->slug]) }}" 
                                                   class="{{ request()->routeIs('tutorials.edit', ['tutorial' => $tutorial->slug]) ? 'active' : '' }}">
                                                    {{ Str::limit($tutorial->title, 30) }}
                                                    @if($tutorial->status === 'published')
                                                        <span class="badge bg-success float-end">Published</span>
                                                    @else
                                                        <span class="badge bg-secondary float-end">Draft</span>
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>
                                            <a href="javascript:void(0);" class="text-muted">
                                                <small>No tutorials yet</small>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="{{ route('profile.edit') }}" 
                               class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
                                <i class="mdi mdi-account"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard 2</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-soft-info rounded">
                                                <i class="fe-aperture avatar-title font-22 text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark my-1">$<span
                                                        data-plugin="counterup">12,145</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Income status</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-uppercase">Target <span class="float-end">60%</span></h6>
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="visually-hidden">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-soft-primary rounded">
                                                <i class="fe-shopping-cart avatar-title font-22 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">1576</span>
                                                </h3>
                                                <p class="text-muted mb-1 text-truncate">January's Sales</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-uppercase">Target <span class="float-end">49%</span></h6>
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                aria-valuenow="49" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 49%">
                                                <span class="visually-hidden">49% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-soft-info rounded">
                                                <i class="fe-bar-chart-2 avatar-title font-22 text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark my-1">$<span data-plugin="counterup">8947</span>
                                                </h3>
                                                <p class="text-muted mb-1 text-truncate">Payouts</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-uppercase">Target <span class="float-end">18%</span></h6>
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="18"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 18%">
                                                <span class="visually-hidden">18% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-soft-primary rounded">
                                                <i class="fe-cpu avatar-title font-22 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">178</span>
                                                </h3>
                                                <p class="text-muted mb-1 text-truncate">Available Stores</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-uppercase">Target <span class="float-end">74%</span></h6>
                                        <div class="progress progress-sm m-0">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 74%">
                                                <span class="visually-hidden">74% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-4 col-md-12">
                            <!-- Portlet card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i
                                                class="mdi mdi-refresh"></i></a>
                                        <a data-bs-toggle="collapse" href="#cardCollpase1" role="button"
                                            aria-expanded="false" aria-controls="cardCollpase1"><i
                                                class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i
                                                class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Lifetime Sales</h4>

                                    <div id="cardCollpase1" class="collapse show">
                                        <div class="text-center pt-3">
                                            <div id="lifetime-sales" data-colors="#7e57c2,#4fc6e1"></div>

                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Target</p>
                                                    <h4><i class="fe-arrow-down text-danger me-1"></i>$7.8k</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Last week</p>
                                                    <h4><i class="fe-arrow-up text-success me-1"></i>$1.4k</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Last Month</p>
                                                    <h4><i class="fe-arrow-down text-danger me-1"></i>$9.8k</h4>
                                                </div>
                                            </div> <!-- end row -->

                                        </div>
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i
                                                class="mdi mdi-refresh"></i></a>
                                        <a data-bs-toggle="collapse" href="#cardCollpase2" role="button"
                                            aria-expanded="false" aria-controls="cardCollpase2"><i
                                                class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i
                                                class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Income Amounts</h4>

                                    <div id="cardCollpase2" class="collapse show">
                                        <div class="text-center pt-3">
                                            <div id="income-amounts" data-colors="#4fc6e1"></div>
                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Target</p>
                                                    <h4><i class="fe-arrow-up text-success me-1"></i>641</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Last week</p>
                                                    <h4><i class="fe-arrow-down text-danger me-1"></i>234</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Last Month</p>
                                                    <h4><i class="fe-arrow-up text-success me-1"></i>3201</h4>
                                                </div>
                                            </div> <!-- end row -->
                                        </div>
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i
                                                class="mdi mdi-refresh"></i></a>
                                        <a data-bs-toggle="collapse" href="#cardCollpase3" role="button"
                                            aria-expanded="false" aria-controls="cardCollpase3"><i
                                                class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i
                                                class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Total Users</h4>

                                    <div id="cardCollpase3" class="collapse show">
                                        <div class="text-center pt-3">
                                            <div id="total-users" data-colors="#4fc6e1,#7e57c2,#e3eaef,#fd7e14"></div>
                                            <div class="row mt-3">
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Target</p>
                                                    <h4><i class="fe-arrow-down text-danger me-1"></i>18k</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Last week</p>
                                                    <h4><i class="fe-arrow-up text-success me-1"></i>3.25k</h4>
                                                </div>
                                                <div class="col-4">
                                                    <p class="text-muted font-13 mb-1 text-truncate">Last Month</p>
                                                    <h4><i class="fe-arrow-up text-success me-1"></i>28k</h4>
                                                </div>
                                            </div> <!-- end row -->
                                        </div>
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i
                                                class="mdi mdi-refresh"></i></a>
                                        <a data-bs-toggle="collapse" href="#cardCollpase4" role="button"
                                            aria-expanded="false" aria-controls="cardCollpase4"><i
                                                class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i
                                                class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Revenue By Location</h4>

                                    <div id="cardCollpase4" class="collapse show">
                                        <div class="pt-3">
                                            <div id="world-map-markers" style="height: 433px"></div>
                                        </div>
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i
                                                class="mdi mdi-refresh"></i></a>
                                        <a data-bs-toggle="collapse" href="#cardCollpase5" role="button"
                                            aria-expanded="false" aria-controls="cardCollpase5"><i
                                                class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i
                                                class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Top Selling Products</h4>

                                    <div id="cardCollpase5" class="collapse show">
                                        <div class="table-responsive pt-3">
                                            <table class="table table-hover table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>ASOS Ridley High Waist</td>
                                                        <td>$79.49</td>
                                                        <td>82</td>
                                                        <td>$6,518.18</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marco Lightweight Shirt</td>
                                                        <td>$128.50</td>
                                                        <td>37</td>
                                                        <td>$4,754.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Half Sleeve Shirt</td>
                                                        <td>$39.99</td>
                                                        <td>64</td>
                                                        <td>$2,559.36</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lightweight Jacket</td>
                                                        <td>$20.00</td>
                                                        <td>184</td>
                                                        <td>$3,680.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marco Shoes</td>
                                                        <td>$28.49</td>
                                                        <td>69</td>
                                                        <td>$1,965.81</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ASOS Ridley High Waist</td>
                                                        <td>$79.49</td>
                                                        <td>82</td>
                                                        <td>$6,518.18</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Half Sleeve Shirt</td>
                                                        <td>$39.99</td>
                                                        <td>64</td>
                                                        <td>$2,559.36</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lightweight Jacket</td>
                                                        <td>$20.00</td>
                                                        <td>184</td>
                                                        <td>$3,680.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table responsive-->
                                    </div> <!-- collapsed end -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; UBold theme by <a href="">Coderthemes</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>

    <!-- Dashboard 2 init -->
    <script src="{{ asset('assets/js/pages/dashboard-2.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>
