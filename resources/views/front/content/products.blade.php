@extends('front.master.subhead')
{{-- @extends('master.footer') --}}
@section('main')
<style>
    .card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem;
  border-radius: calc(0.42rem - 1px);
}
</style>
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products</h1>
                {{-- <span>We have over 20 years of experience</span> --}}
                <form action="{{url('product/search')}}" method="get" class="form-inline  justify-content-center mt-3">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search products ..." name="cari" value="{{ old('cari') }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div style="margin-top:0px;" class="container mb-5">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="section-heading">
                <nav class="navbar navbar-white bg-white">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{url('categories')}}"  class="btn btn-secondary">All</a>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Categories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                @foreach ($kate as $item)
                                <a class="dropdown-item" href="{{ ('../product/categories/'.$item->slug_kategori) }}">{{$item->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        @foreach ($data as $item)
        {{-- <div class="col-md-4 mb-5">
            <div class="service-item">
                <img style=" display: block; margin-left: auto; margin-right: auto; height: 350px%; width:350px%;" src="{{ URL::asset('img_products') }}/{{$item->foto}}" alt="">
                <div class="down-content">
                    <h4>{{ $item->judul }}</h4>
                    <span class="badge badge-primary">{{ $item->kat_name}}</span>
                    <span class="badge badge-warning">{{ $item->sub_name}}</span>
                    <p>{!! Str::limit( strip_tags($item->keterangan),50)!!}</p>
                    <a href="{{url('product/detail/'.$item->slug)}}" class="filled-button">Read More</a>
                </div>
            </div>
        </div> --}}

        <div class="mb-3 order-4 col-md-4 col-sm-4 col-12 mt-3">
            <div class="h-100 shadow-sm card">
                <img style="border-radius: 8px 8px 0 0;" class="card-img image-list-pelatihan-new" src="{{ URL::asset('img_products') }}/{{$item->foto}}" alt="Image Thumbnail" style="object-fit: cover; position: absolute; height: 180px;">
                <div class="position-relative card-body">
                    <hr>
                    <h4>{{ $item->judul }}</h4>
                    <div class="d-flex flex-column" style="">
                        <div class="date d-flex align-items-center align-middle">
                        </div>
                        <div class="date d-flex align-items-center align-middle">
                            <span class="badge badge-primary">{{ $item->kat_name}}</span>
                            <span class="badge badge-warning">{{ $item->sub_name}}</span>
                        </div>
                        <p>{!! Str::limit( strip_tags($item->keterangan),100)!!}</p>
                        <hr>
                    </div>
                    <a href="{{url('product/detail/'.$item->slug)}}" class="filled-button">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {!! $data->links('vendor.pagination.bootstrap-4') !!}
</div>

@endsection