@extends('front.master.subhead')
{{-- @extends('master.footer') --}}
@section('main')
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Categories</h1>
            </div>
        </div>
    </div>
</div>


<div style="margin-top:0px;" class="container">
    <div class="row mb-5">
        {{--<div class="col-md-12">
            <div class="section-heading">
                @foreach ($head as $item)
                <h2>List <em>categories&#8594; {{$item->kat_name}}</em></h2>
                @endforeach
                 <nav class="navbar navbar-white bg-white">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href=" "  class="btn btn-secondary"></a>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Subcategories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                @foreach ($slect as $item)
                                <a class="dropdown-item" href="{{url('product/subcategories/'.$item->slug_sub)}}">{{$item->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </nav> 
            </div>
        </div>--}}

        <div class="col-12 col-md-3 col-xl-3 bd-sidebar">
            <div class="list-group mt-3">
                
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">
                                <h5 class="text-center">Products</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kate as $item)
                        <tr>
                            <td>
                                <a href="{{ ('../../product/categories/'.$item->slug_kategori) }}" class="list-group-item list-group-item-action">{{$item->name}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @foreach ($barang as $item)
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
    {!! $barang->links('vendor.pagination.bootstrap-4') !!}
    <a class="btn btn-outline-info mb-5" href="{{ url()->previous() }}">Previous</a>
</div>

@endsection