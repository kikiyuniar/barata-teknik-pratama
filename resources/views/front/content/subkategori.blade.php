@extends('front.master.subhead')
{{-- @extends('master.footer') --}}
@section('main')
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>SubCategories</h1>
            </div>
        </div>
    </div>
</div>


<div style="margin-top:0px;" class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <div class="section-heading">
                @foreach ($head as $item)
                <h2>List <em>subcategories&#8594; {{$item->name}}</em></h2>
                    {{-- <a href="{{URL::to('/')}}/file_pdf/{{$item->file}}" target="_blank" class="filled-button">Download</a> --}}
                 @endforeach
            </div>
        </div>

         @foreach ($barang as $item)
        <div class="col-md-4">
            <div class="service-item">
                <img src="{{ URL::asset('img_products') }}/{{$item->foto}}" alt="">
                <div class="down-content">
                    <h4>{{ $item->judul }}</h4>
                    <span class="badge badge-primary">{{ $item->kat_name}}</span>
                    <span class="badge badge-warning">{{ $item->sub_name}}</span>
                    <p>{!! Str::limit( strip_tags($item->keterangan),50)!!}</p>
                    <a href="{{url('product/detail/'.$item->slug)}}" class="filled-button">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a class="btn btn-outline-info mb-5" href="{{ url()->previous() }}">Previous</a>
</div>

@endsection