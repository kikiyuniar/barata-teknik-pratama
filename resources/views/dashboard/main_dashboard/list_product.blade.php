@extends('dashboard.master_dashboard.head')
@section('main')
<style>
    /*the container must be positioned relative:*/
    .custom-select {
    position: relative;
    font-family: Arial;
    }

    .custom-select select {
    display: none; /*hide original SELECT element:*/
    }
</style>

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="card-inner">
                    <div class="preview-block">
                        <div class="row gy-4">
                            <div class="col-sm-12">
                                <hr class="preview-hr">
                                <a class="btn btn-primary" href="products">Add Product</a>
                                <hr class="preview-hr">
                                <span class="preview-title-lg overline-title">List Products</span>
                                <div class="row gy-4 align-center">
                                    {{-- tabel kategori --}}
                                    <div class="col-12">
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init table">
                                                    <thead>
                                                        <tr class="tb-odr-item">
                                                            <th>No</th>
                                                            <th>Title</th>
                                                            <th>Slug</th>
                                                            <th>Description</th>
                                                            <th>Category</th>
                                                            <th>Sub Category</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tb-odr-body">
                                                        @foreach ($barang as $item)
                                                        <tr class="tb-odr-item">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->judul }}</td>
                                                            <td>{{ $item->slug }}</td>
                                                            <td>{!! Str::limit( strip_tags($item->keterangan),50)!!}</td>
                                                            <td>{{ $item->kate_name }}</td>
                                                            <td>{{ $item->sub_name }}</td>
                                                            <td>
                                                            @if ( $item->status == "tampilkan")
                                                                <form action="/update_top_product" method="get">
                                                                @csrf
                                                                    <input type="text" value="{{$item->id}}" name="id" hidden>
                                                                    <input type="text" value="{{$item->status}}" name="status" hidden>
                                                                    <button class="btn btn-white" type="submit"><i style="font-size: 2rem;color: yellow" class="bi bi-star-fill"></i></button>
                                                                </form>
                                                            @elseif ( $item->status == "sembunyikan")
                                                                <form action="/update_top_product" method="get">
                                                                @csrf
                                                                    <input type="text" value="{{$item->id}}" name="id" hidden>
                                                                    <input type="text" value="{{$item->status}}" name="status" hidden>
                                                                    {{-- <a class="btn btn-secondary"><i class="bi bi-star-fill"></i></a> --}}
                                                                    <button class="btn btn-white " type="submit"><i style="font-size: 2rem;color: rgb(167, 162, 162)" class="bi bi-star-fill"></i></button>
                                                                </form>
                                                            @endif
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-list-plain">
                                                                            <li>
                                                                                <a href="/edit/{{ $item->id }}" class="text-primary">Edit</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="/del/{{ $item->id }}" onclick="return confirm('Delete {{$item->judul}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
</div>
@endsection