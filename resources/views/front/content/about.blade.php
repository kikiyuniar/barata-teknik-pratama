@extends('front.master.subhead')
{{-- @extends('master.footer') --}}
@section('main')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                    {{-- <span>We have over 20 years of experience</span> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="more-info about-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="more-info-content">
                        <div class="row">
                            @foreach ($about as $item)
                                
                            <div class="col-md-6 align-self-center">
                                <div class="right-content">
                                    {{-- <span>our solid background on finance</span> --}}
                                    <h2>Get to know about <em>our company</em></h2>
                                    <p>{!! strip_tags($item->keterangan) !!}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="left-image">
                                    <img src="{{ URL::asset('img_about') }}/{{$item->foto}}" alt="">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Our <em>business </em></h2>
                        <span>Our Business Activities Procurement And Services Include</span>
                    </div>
                </div>
                @foreach ($ourbusiness as $item)
                <div class="col-md-4">
                    <div class="team-item">
                        <div class="down-content">
                            <img class="mb-3" style="width: 40%; display:block; margin:auto;" src="{{ URL::asset('img_business') }}/{{$item->foto}}" alt="">
                            <h4>{{$item->judul}}</h4>
                            <p>{!! strip_tags($item->keterangan) !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-content">
                        @foreach ($services as $item)
                            
                        <h2>OUR PRODUCTS AND SERVICES  <em>ARE APPLICABLE IN MANY INDUSTRIES</em></h2>
                        <p>{!! nl2br($item->keterangan) !!}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <img src="{{ URL::asset('head') }}/assets/images/sugar.svg" alt="">
                                {{-- <div class="count-title">Work Hours</div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <img src="{{ URL::asset('head') }}/assets/images/palm.svg" alt="">
                                {{-- <div class="count-title">Great Reviews</div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <img src="{{ URL::asset('head') }}/assets/images/oil.svg" alt="">
                                {{-- <div class="count-title">Projects Done</div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="count-area-content">
                                <img src="{{ URL::asset('head') }}/assets/images/shipping.svg" alt="">
                                {{-- <div class="count-title">Awards Won</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Vision and Mission</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($vision as $item)
                        <div class="col-md-6">
                            <div class="team-item">
                                {{-- <img src="{{ URL::asset('head') }}/assets/images/team_03.jpg" alt=""> --}}
                                <div class="down-content">
                                    <h4>{{$item->judul}}</h4>
                                    <p>{!! preg_replace("/(<[a-zA-Z0-9=\"\/\ ]+>)<br\ \/>/", "$1",nl2br($item->keterangan)) !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
