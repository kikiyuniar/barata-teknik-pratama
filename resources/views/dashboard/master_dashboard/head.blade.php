<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | CV. Barata Teknik Pratama</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/drop-files.css">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/css/app.css">
    <link rel="stylesheet" href="{{ URL::asset('dapur') }}/assets/vendors/simple-datatables/style.css">
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            Dashboard
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }} ">
                            <a href="{{url('dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-title">Components</li>
                        <li class="sidebar-item {{ Request::is('profile') ? 'active' : '' }} ">
                            <a href="{{url('profile')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ Request::is('category','sub_category') ? 'active' : '' }} has-sub">
                            <a class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Categories</span>
                            </a>
                            <ul class="submenu {{ Request::is('category','sub_category') ? 'active' : '' }} ">
                                <li class="submenu-item {{ Request::is('category') ? 'active' : '' }}">
                                    <a href="{{url('category')}}">Category / Merk</a>
                                </li>
                                <li class="submenu-item {{ Request::is('sub_category') ? 'active' : '' }}">
                                    <a href="{{url('sub_category')}}">Subcategory / type</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item {{ Request::is('products','list_products') ? 'active' : '' }}  has-sub">
                            <a  class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Products</span>
                            </a>
                            <ul class="submenu {{ Request::is('products','list_products') ? 'active' : '' }}">
                                <li class="submenu-item {{ Request::is('products') ? 'active' : '' }}">
                                    <a href="{{url('products')}}">Add Product</a>
                                </li>
                                <li class="submenu-item {{ Request::is('list_products') ? 'active' : '' }}">
                                    <a href="{{url('list_products')}}">List Products</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Layouts</li>

                        <li class="sidebar-item {{ Request::is('slide','dash_about','slide_add') ? 'active' : '' }} has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="submenu {{ Request::is('slide','dash_about') ? 'active' : '' }}">
                                <li class="submenu-item {{ Request::is('slide') ? 'active' : '' }}">
                                    <a href="{{url('slide')}}">Slide</a>
                                </li>
                                <li class="submenu-item {{ Request::is('dash_about') ? 'active' : '' }}">
                                    <a href="{{url('dash_about')}}">About Us</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Message</li>

                        <li class="sidebar-item {{ Request::is('contact') ? 'active' : '' }} ">
                            <a href="{{url('contact')}}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Contacts</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url('logout')}}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">

         @yield('main')

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <?php $tgl=date('Y'); ?>
                <div class="float-start">
                    <p>{{$tgl}} &copy; Workplaeme </p>
                </div>
                <div class="float-end">
                    <p>CV.Barata Teknik Pratama.</p>
                </div>
            </div>
        </footer>
        </div>
    </div>
    <script src="{{ URL::asset('dapur') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ URL::asset('dapur') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('dapur') }}/assets/js/pages/dashboard.js"></script>
    <script src="{{ URL::asset('dapur') }}/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="{{ URL::asset('dapur') }}/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <script src="cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
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
                        url: "getsubkategori",
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
</body>

</html>