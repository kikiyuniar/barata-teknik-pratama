@extends('front.master.head')
{{-- @extends('master.footer') --}}
@section('main')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
    .slider .slick-slide {
        border: solid 1px #000;
        top: 30px ;!important
    }
    .slider .slick-slide img {
        width: 100%;
    }
    .lis {
      color: black;
    }
    
    .lis:hover {
      color: #0d8def;
    }
    
    li.b {
      list-style-type: square;
      margin-left: 10px;
    }
</style>
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
            
            <div style="top: 50px" class="slider">
                @foreach ($slide as $item)
                <div>
                    <a href="#">
                        <img src="{{ URL::asset('img_slide') }}/{{$item->foto}}" alt="Image 1">
                    </a>            
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="request-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Request a call back right now ?</h4>
                    <span>If you have any questions or comments contact us.</span>
                </div>
                <div class="col-md-4">
                    <a href="#contactus" class="border-button">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="partners" style="margin-top: 0px; padding:0px">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-partners owl-carousel owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @foreach ($top as $item)
                        <div class="owl-item">
                            <div class="partner-item">
                                <img src="{{ URL::asset('img_products') }}/{{$item->foto}}" title="{{Str::limit( strip_tags($item->judul),20)}}" alt="2">
                            </div>
                            <span class="badge badge-primary">{{ $item->kat_name}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-top: 0px" class="services" id="about">
        <div class="container">
            <div class="row">
                {{-- <div class="col-12">
                    <div class="section-heading">
                        <h2>What they say <em>About Us</em></h2>
                    </div>
                </div> --}}
                <div class="col-12 col-md-3 col-xl-3 bd-sidebar">
                    <div class="list-group mt-3">
                        
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        <a href="{{url('product')}}">
                                            <h5 class="text-center">Products</h5>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>
                                        <ul>
                                            @foreach ($kate as $item)
                                            <li class="b"><a class="lis" href="{{ ('../product/categories/'.$item->slug_kategori) }}">{{$item->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="more-info mb-5 mt-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="more-info-content">
                                        <div class="row">
                                            <div class="col-md-12 align-self-center">
                                                @foreach ($home as $item)
                                                <div class="right-content">
                                                    <span>Who we are</span>
                                                    <h2>CV. Barata Teknik Pratama</h2>
                                                    <p>{!! preg_replace('#<br\s*/?>#', "\n",nl2br($item->keterangan)) !!}</p>
                                                    <a href="about" class="filled-button">Read More</a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="fun-facts" id="product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2 style="color: white">Top <em>Products</em></h2>
                    </div>
                </div>
                <div class="col-md-12 align-self-center">
                    <div class="row">
                        @foreach ($top as $item)
                        <div class="col-md-4 mb-1">
                            <div class="service-item">
                                <img src="{{ URL::asset('img_products') }}/{{$item->foto}}" alt="">
                                <div class="mt-3">
                                    <h4><a style="color: white" href="{{url('product/detail/'.$item->slug)}}">{{Str::limit( strip_tags($item->judul),20)}}</a></h4>
                                    <p>{!! Str::limit( strip_tags($item->keterangan),50)!!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="product" class="filled-button mt-5">See All</a>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
