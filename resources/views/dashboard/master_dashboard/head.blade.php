<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ URL::asset('dapur') }}/images/favicon.png">
    <!-- Page Title  -->
    <title>Dashboard | CV. Barata Teknik Pratama</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/theme.css?ver=2.9.0">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/drop-files.css">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/libs/fontawesome-icons.css?ver=2.9.0">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/libs/themify-icons.css?ver=2.9.0">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/libs/bootstrap-icons.css?ver=2.9.0">
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{url('dashboard')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ URL::asset('head') }}/assets/images/LOGOBTP.png"
                                srcset="{{ URL::asset('head') }}/assets/images/LOGOBTP.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="{{ URL::asset('head') }}/assets/images/LOGOBTP.png"
                                srcset="{{ URL::asset('head') }}/assets/images/LOGOBTP.png 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small"
                                src="{{ URL::asset('head') }}/assets/images/LOGOBTP.png"
                                srcset="{{ URL::asset('head') }}/assets/images/LOGOBTP.png 2x" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                                class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                            data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">

                                <li class="nk-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
                                    <a href="dashboard" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Dashboard</span></span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item {{ Request::is('profile') ? 'active' : '' }}">
                                    <a href="profile" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                        <span class="nk-menu-text">Profile</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Item Categories</h6>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item {{ Request::is('category') ? 'active' : '' }}">
                                    <a href="category" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                                        <span class="nk-menu-text">Category List</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Item Products</h6>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item {{ Request::is('list_products') ? 'active' : '' }}">
                                    <a href="list_products" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                        <span class="nk-menu-text">Product List</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                 <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Front Page</h6>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item {{ Request::is('slide') ? 'active' : '' }}">
                                    <a href="slide" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                        <span class="nk-menu-text">Slides</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item {{ Request::is('dash_bout') ? 'active' : '' }}">
                                    <a href="dash_about" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                        <span class="nk-menu-text">About Us</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                
                                <li class="nk-menu-item {{ Request::is('contact') ? 'active' : '' }}">
                                    <a href="contact" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                        <span class="nk-menu-text">Contact Us</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="{{url('dashboard')}}" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                        class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="{{url('dashboard')}}" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ URL::asset('head') }}/assets/images/LOGOBTP.png"
                                        srcset="{{ URL::asset('head') }}/assets/images/LOGOBTP.png 2x" alt="logo">
                                    <img class="logo-dark logo-img"
                                        src="{{ URL::asset('head') }}/assets/images/LOGOBTP.png"
                                        srcset="{{ URL::asset('head') }}/assets/images/LOGOBTP.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            {{-- <div class="nk-header-search ml-3 ml-xl-0">
                                <em class="icon ni ni-search"></em>
                                <input type="text" class="form-control border-transparent form-focus-none"
                                    placeholder="Search anything">
                            </div><!-- .nk-header-news --> --}}
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    {{-- <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li> --}}
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar">
                                                    <img src="{{ URL::asset('img_profile') }}/{{Auth::user()->foto}}" alt="">
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-unverified">
                                                        {{ Auth::user()->email }}</div>
                                                    <div class="user-name dropdown-indicator">
                                                        {{ Auth::user()->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{url('profile')}}">
                                                            <em class="icon ni ni-user-alt"></em>
                                                            <span>View Profile</span>
                                                        </a>
                                                    </li>
                                                    <li><a class="dark-switch active" href="#">
                                                            <em class="icon ni ni-moon"></em>
                                                            <span>Dark Mode</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="logout"><em class="icon ni ni-signout"></em><span>Sign
                                                                out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a target="_blank" style="font-size: 25px" href="{{url('/')}}">| <i class="bi bi-globe lg"></i></a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header -->
                @yield('main')
                <!-- end main header -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <?php $tgl=date('Y'); ?>
                            <div class="nk-footer-copyright"> &copy; {{$tgl}} 
                                CV.Barata Teknik Pratama. by <a
                                    href="workplaceme.net" target="_blank">Workplaeme</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <!-- JavaScript -->
    <script src="{{ URL::asset('dapur') }}/assets/js/bundle.js?ver=2.9.0"></script>
    <script src="{{ URL::asset('dapur') }}/assets/js/scripts.js?ver=2.9.0"></script>
    <script src="{{ URL::asset('dapur') }}/assets/js/charts/chart-ecommerce.js?ver=2.9.0"></script>
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/editors/tinymce.css?ver=2.9.0">
    <script src="{{ URL::asset('dapur') }}/assets/js/libs/editors/tinymce.js?ver=2.9.0"></script>
    <script src="{{ URL::asset('dapur') }}/assets/js/editors.js?ver=2.9.0"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/editors/summernote.css?ver=2.9.0">
    <script src="{{ URL::asset('dapur') }}/assets/js/libs/editors/summernote.js?ver=2.9.0"></script>
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/editors/quill.css?ver=2.9.0">
    <script src="{{ URL::asset('dapur') }}/assets/js/libs/editors/quill.js?ver=2.9.0"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                $('#kategori').on('change', function() {
                    let id_kategori = $('#kategori').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ 'getsubkategori' }}",
                        data: {
                            id_kategori: id_kategori
                        },
                        cache: false,

                        success: function(msg) {
                            $('#subkategori').html(msg);
                        },
                        error: function(data) {
                            console.log('error:', data);
                        },
                    });
                });
            });
        });
    </script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('.ckeditor').ckeditor();
        });
    </script>

</body>

</html>
