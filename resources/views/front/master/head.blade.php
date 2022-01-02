<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Finance Business HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('head')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" /> --}}
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{URL::asset('head')}}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{URL::asset('head')}}/assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="{{URL::asset('head')}}/assets/css/owl.css">
    <!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   --}}
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info">
                        {{-- <li><a href="#"><i class="fa fa-clock-o"></i>Mon-Fri 09:00-17:00</a></li> --}}
                        <li><a  href="tel://03199787988"><i class="fa fa-phone"></i>(031) 99-787-988</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        {{-- <li><a href="#"><i class="fa fa-behance"></i></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a  href="{{('/')}}">
                    <img style="width: 120px" src="{{URL::asset('head')}}/assets/images/LOGOBTP.png" alt="">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link current" href="#top">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#services">Visi Misi</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#services">Service</a>
                        </li> --}}
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#catalog">Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#project">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactus">Contact Us</a>
                        </li>
                        {{-- <li class="nav-item">
                <a class="nav-link external" href="index.html">Multi-page</a>
              </li> --}}
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
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-item">
                    <h4>Finance Business</h4>
                    <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien
                        vitae.</p>
                    <ul class="social-icons">
                        <li><a rel="nofollow" href="https://fb.com/templatemo" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-item">
                    <h4>Useful Links</h4>
                    <ul class="menu-list">
                        <li><a href="#">Vivamus ut tellus mi</a></li>
                        <li><a href="#">Nulla nec cursus elit</a></li>
                        <li><a href="#">Vulputate sed nec</a></li>
                        <li><a href="#">Cursus augue hasellus</a></li>
                        <li><a href="#">Lacinia ac sapien</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-item">
                    <h4>Additional Pages</h4>
                    <ul class="menu-list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">How We Work</a></li>
                        <li><a href="#">Quick Support</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="login">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-item last-item">
                    <h4>Contact Us</h4>
                    <div class="contact-form">
                        <form id="contact footer-contact" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Full Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email"
                                            pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message"
                                            placeholder="Your Message" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="filled-button">Send
                                            Message</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright &copy; 2020 Financial Business Co., Ltd.

                        - Design: <a rel="nofollow noopener" href="https://templatemo.com"
                            target="_blank">TemplateMo</a><br>
                        Distributed By: <a rel="nofollow noopener" href="https://themewagon.com"
                            target="_blank">ThemeWagon</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{URL::asset('head')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{URL::asset('head')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="{{URL::asset('head')}}/assets/js/jquery.singlePageNav.min.js"></script>
    <script src="{{URL::asset('head')}}/assets/js/custom.js"></script>
    <script src="{{URL::asset('head')}}/assets/js/owl.js"></script>
    <script src="{{URL::asset('head')}}/assets/js/slick.js"></script>
    <script src="{{URL::asset('head')}}/assets/js/accordions.js"></script>

    <script>
        $(function () {
            // Single Page Nav
            $('#navbarResponsive').singlePageNav({
                'offset': 100,
                'filter': ':not(.external)'
            });

            // On mobile, close the menu after nav-link click
            $('#navbarResponsive .navbar-nav .nav-item .nav-link').click(function () {
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

        $('.dropdown-toggle').dropdown();

    </script>

</body>

</html>
