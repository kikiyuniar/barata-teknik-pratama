@extends('dashboard.auth.master.app')
@section('main')
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                                        class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="pb-5">
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <a href="{{url('/')}}" class="btn btn-dim btn-round btn-primary"><em class="icon ni ni-back-alt-fill"></em><span>Back to Home</span></a>
                                        <br><br>
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        
                                        <p>Access the dashboard using your email and passcode.</p>
                                        <div class="nk-block-des">
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                @if ($message = Session::get('danger'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <form action="{{url('login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                            {{-- <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a> --}}
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="default-01"
                                                placeholder="Enter your email address " name="email">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                placeholder="Enter your password" name="password">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-dim btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form><!-- form -->
                                
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="mt-3">
                                    <p>&copy; <?= date('Y'); ?> Workplaceme.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->


@endsection
