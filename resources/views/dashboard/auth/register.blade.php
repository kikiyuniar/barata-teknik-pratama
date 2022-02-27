@extends('dashboard.auth.master.app')
{{-- @extends('master.footer') --}}
@section('main')

    {{-- <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ URL::asset('back') }}/assets/images/logo/logo.png"
                                alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>
                    <form action="register" method="POST">
                        @csrf
                        @if (session('errors'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Something it's wrong:
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="name" class="form-control form-control-xl" placeholder="Nama lengkap">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" name="email" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Confirm Password"
                                name="password_confirmation">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="login" class="font-bold">Login</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div> --}}

    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em
                                        class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg"
                                            src="{{ URL::asset('dapur') }}/images/logo.png"
                                            srcset="{{ URL::asset('dapur') }}/images/logo2x.png 2x" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg"
                                            src="{{ URL::asset('dapur') }}/images/logo-dark.png"
                                            srcset="{{ URL::asset('dapur') }}/images/logo-dark2x.png 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Register</h5>
                                        <div class="nk-block-des">
                                            <p>Create New Dashlite Account</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="register" method="POST">
                                    @csrf
                                    @if (session('errors'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Something it's wrong:
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="name"
                                                placeholder="Enter your name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email or Username</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="email"
                                                placeholder="Enter your email address or username" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                placeholder="Enter your password" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password_confirmation">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg"
                                                id="password_confirmation" placeholder="Confirm Password"
                                                name="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-control-xs custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox">
                                            <label class="custom-control-label" for="checkbox">I agree to Dashlite <a
                                                    tabindex="-1" href="#">Privacy Policy</a> &amp; <a tabindex="-1"
                                                    href="#"> Terms.</a></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Register</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Already have an account ? <a
                                        href="html/pages/auths/auth-login-v3.html"><strong>Sign in instead</strong></a>
                                </div>
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <ul class="nav justify-center gx-8">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul>
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li>
                                        <li class="nav-item dropup">
                                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link"
                                                data-toggle="dropdown" data-offset="0,10"><small>English</small></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="language-list">
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ URL::asset('dapur') }}/images/flags/english.png"
                                                                alt="" class="language-flag">
                                                            <span class="language-name">English</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ URL::asset('dapur') }}/images/flags/spanish.png"
                                                                alt="" class="language-flag">
                                                            <span class="language-name">Español</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ URL::asset('dapur') }}/images/flags/french.png"
                                                                alt="" class="language-flag">
                                                            <span class="language-name">Français</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ URL::asset('dapur') }}/images/flags/turkey.png"
                                                                alt="" class="language-flag">
                                                            <span class="language-name">Türkçe</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul><!-- nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; 2021 DashLite. All Rights Reserved.</p>
                                </div>
                            </div><!-- nk-block -->
                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->



@endsection
