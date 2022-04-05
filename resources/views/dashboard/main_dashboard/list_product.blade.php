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

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Products Management</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
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
                <div class="form-group">
                    <a class="btn btn-primary" href="products">Add Product</a>
                </div>
                <hr>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
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
                    <tbody>
                        @foreach ($barang as $item)
                        <tr>
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
                                <a href="/edit/{{ $item->id }}" class="text-primary">Edit</a>
                                <a href="/del/{{ $item->id }}" onclick="return confirm('Delete {{$item->judul}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection