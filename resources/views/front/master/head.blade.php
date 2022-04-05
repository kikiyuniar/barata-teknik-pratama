<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>CV. Barata Teknik Pratama</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('head') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" /> --}}
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('head') }}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ URL::asset('head') }}/assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="{{ URL::asset('head') }}/assets/css/owl.css">
    <!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info">
                        {{-- <li><a href="#"><i class="fa fa-clock-o"></i>Mon-Fri 09:00-17:00</a></li> --}}
                        <li><a href="tel://03199787988"><i class="fa fa-phone"></i>(031) 99-787-988</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                        {{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
                        {{-- <li><a href="#"><i class="fa fa-behance"></i></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="">
        <nav style="background-color: #ffffff;" class="navbar navbar-expand-lg">
            <div class="container">
                <a href="{{ '/' }}">
                    <img style="width: 120px" src="{{ URL::asset('head') }}/assets/images/LOGOBTP.png" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a style="color: black;" class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a style="color: black;" class="nav-link" href="{{url('about')}}">About Us</a>
                        </li>
                        <li class="nav-item dropdown {{ Request::is('') ? 'active' : '' }}">
                        <a style="color: black;"  class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Products
                        </a>
                        <div class="dropdown-menu">
                            @php
                                $data = App\Models\Kategori::all();
                            @endphp
                            @foreach ($data as $item)
                            <a class="dropdown-item" href="{{ ('../product/categories/'.$item->slug_kategori) }}">{{$item->name}}</a>
                            @endforeach
                        </div>
                        <br>
                        </li>
                        <li class="nav-item">
                            <a style="color: black;" class="nav-link" href="{{url('/contact_us')}}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>



    <!-- Page Content -->
    @yield('main')

    <!-- Footer Starts Here -->

    {{-- @yield('footer') --}}
    <footer>
        <div style="padding: 50px" >
            <div class="row">
                <div class="col-md-4 footer-item">
                    <img width="30%" src="{{ URL::asset('head') }}/assets/images/LOGOBTP.png" alt="">
                    <p>CV. Barata Teknik Pratama is Industrial Supplier and Technical Service company in the field of mechanical, electrical, and instrumentation. Our current activities including factory repair and workmanship, trading, marketing, distribution. We committed to quality, cost and delivery oriented in prioritizing our client satisfaction.</p>
                    
                </div>
                <div class="col-md-4 footer-item"></div>
                <div class="col-md-4 footer-item">
                    <div style="padding-right: 0px" class="row">
                        <div class="col-md-6">
                            <h4>Location</h4>
                            <h6>HEAD OFFICE :</h6>
                            <p>Jl. Ketegan Barat RT 05/01 61257 <br> Taman – Sidoarjo</p>
                            <br>
                            <h6>BRANCH OFFICE :</h6>
                            <p>Jl. Tamalate IV STP 3 No. 139 RT 02/02 <br> Kassi - Kassi Rappocini - Makassar</p>
                            <br>
                            <h6>BRANCH OFFICE :</h6>
                            <p>Jl. Aryawangsa Kara Komplek Duta Asri Jatiluwung III Blok GB14 No. 19. <br> Tangerang – Banten</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php $tgl=date('Y'); ?>
                    <p>Copyright &copy; {{$tgl}} CV.Barata Teknik Pratama

                        - Design: <a href="workplaceme.net"
                            target="_blank">Workplaceme</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('head') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ URL::asset('head') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="{{ URL::asset('head') }}/assets/js/jquery.singlePageNav.min.js"></script>
    <script src="{{ URL::asset('head') }}/assets/js/custom.js"></script>
    <script src="{{ URL::asset('head') }}/assets/js/owl.js"></script>
    <script src="{{ URL::asset('head') }}/assets/js/slick.js"></script>
    <script src="{{ URL::asset('head') }}/assets/js/accordions.js"></script>

    <script>
        $(function() {
            // Single Page Nav
            $('#navbarResponsive').singlePageNav({
                'offset': 100,
                'filter': ':not(.external)'
            });

            // On mobile, close the menu after nav-link click
            $('#navbarResponsive .navbar-nav .nav-item .nav-link').click(function() {
                $('#navbarResponsive').removeClass('show');
            });
        });
    </script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.slider').slick({
            autoplay: true,
            autoplaySpeed: 2500,
            dots: true
            });
        });
    </script>

</body>

</html>
