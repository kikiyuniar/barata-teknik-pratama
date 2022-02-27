@extends('front.master.subhead')
{{-- @extends('master.footer') --}}
@section('main')
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Categories</h1>
                <form action="{{url('catalog/search')}}" method="get" class="form-inline  justify-content-center mt-3">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search categories..." aria-label="Search" name="cari" value="{{ old('cari') }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div style="margin-top:0px;" class="container mb-5">
    <div id="table_data" class="row mt-5 mb-5">
        <div class="col-md-12">
            <div class="section-heading">
                <h2>List <em>categories</em></h2>
            </div>
        </div>
        @foreach ($data as $item)
        <div class="col-md-4 mt-3">
            <div class="service-item">
                <img src="{{ URL::asset('img_kategori') }}/{{$item->foto}}" alt="">
                <div class="down-content">
                    <h4>{{ $item->name }}</h4>
                    <p>{!! Str::limit( strip_tags($item->keterangan),50)!!}</p>
                    <a href="{{ ('../product/categories/'.$item->slug_kategori) }}" class="filled-button">Select</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {!! $data->links('vendor.pagination.bootstrap-4') !!}
    <a class="btn btn-outline-info" href="{{ url()->previous() }}">Back</a>
    
</div>

@endsection