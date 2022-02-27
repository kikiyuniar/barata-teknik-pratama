@extends('front.master.subhead')
{{-- @extends('master.footer') --}}
@section('main')
    <style>
        #content-wrapper{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .column{
            width: 600px;
            padding: 10px;

        }

        #featured{
            max-width: 500px;
            max-height: 600px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid black;

        }

        .thumbnail{
            object-fit: cover;
            max-width: 180px;
            max-height: 100px;
            cursor: pointer;
            opacity: 0.5;
            margin: 5px;
            border: 2px solid black;

        }

        .thumbnail:hover{
            opacity:1;
        }

        .active{
            opacity: 1;
        }

        #slide-wrapper{
            max-width: 500px;
            display: flex;
            min-height: 100px;
            align-items: center;
            margin-right: 10px;
        }

        #slider{
            width: 440px;
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;

        }

        #slider::-webkit-scrollbar {
                width: 8px;

        }

        #slider::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);

        }
        
        #slider::-webkit-scrollbar-thumb {
        background-color: #dede2e;
        outline: 1px solid slategrey;
        border-radius: 100px;

        }

        #slider::-webkit-scrollbar-thumb:hover{
            background-color: #18b5ce;
        }

        .arrow{
            width: 30px;
            height: 30px;
            cursor: pointer;
            transition: .3s;
        }

        .arrow:hover{
            opacity: .5;
            width: 35px;
            height: 35px;
        }
    </style>

<div style="padding-top: 119px !important; padding-bottom: 20px !important;text-align: left " class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Product</h1>
                {{-- <span>We have over 20 years of experience</span> --}}
            </div>
        </div>
    </div>
</div>

<div style="margin-top:0px;" class="container">
    <div class="row mt-5 mb-5">
        @foreach ($barang as $item)
        <div class="col-md-5">
            <img width="100%" id=featured src="{{ URL::asset('img_products') }}/{{$item->foto}}">
            <div id="slide-wrapper" >
                <img id="slideLeft" class="arrow" src="{{ URL::asset('images') }}/arrow-left.png">
                <div id="slider">
                    <img class="thumbnail" src="{{ URL::asset('img_products') }}/{{$item->foto}}">
                    <img class="thumbnail" src="{{ URL::asset('img_products') }}/{{$item->foto2}}">
                    <img class="thumbnail" src="{{ URL::asset('img_products') }}/{{$item->foto3}}">
                </div>
                <img id="slideRight" class="arrow" src="{{ URL::asset('images') }}/arrow-right.png">
            </div>
        </div>
        <div class="col-sm-7">
            <h2 class="text-break">{{$item->judul}}</h2>
            <span class="badge badge-primary">{{ $item->kat_name}}</span>
            <span class="badge badge-warning">{{ $item->sub_name}}</span>
            <hr>
            <p >{!! preg_replace('#<br\s*/?>#', "\n",nl2br($item->keterangan)) !!}</p>
            <hr>
             <a href="{{URL::to('/file_pdf')}}/{{$item->file}}" target="_blank">
                <button class="btn btn-outline-danger"><i class="fa fa-download"></i> <i class="fa fa-file-pdf-o"></i> Catalog</button>
            </a>
        </div>
        @endforeach
    </div>
    <a class="btn btn-outline-info mb-5" href="{{ url()->previous() }}">Previous</a>
</div>
        


@endsection