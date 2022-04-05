@extends('dashboard.master_dashboard.head')
@section('main')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Category Management</h3>
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
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">Add Category</button>
                </div>
                <hr>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name Category</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img src="{{ URL::asset('img_kategori') }}/{{$item->foto}}" alt="" width="100">
                            </td>
                            <td>{!! Str::limit( strip_tags($item->keterangan),50)!!}</td>
                            <td>
                                <a class="text-primary" data-bs-toggle="modal" data-bs-target="#modalForm{{ $item->slug_kategori }}">Edit</a>
                                <a href="/del_category/{{ $item->id }}" onclick="return confirm('Delete {{$item->name}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
    
    <!-- Modal Form Kategori --> 
    <div class="modal fade" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Insert Category</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="add_category" class="form-validate is-alter" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="full-name">Name Category</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="full-name" required name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Upload image category</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" name="foto" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea name="keterangan" required class="tinymce-basic form-control">Hello, World!</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form edit Kategori -->
    @foreach ($kategori as $item)
    <div class="modal fade" id="modalForm{{ $item->slug_kategori }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="edit_category/{{ $item->id }}" class="form-validate is-alter" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <div class="form-control-wrap">
                                <input value="{{$item->name}}" type="text" class="form-control" id="full-name" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <img width="100%" src="{{ URL::asset('img_kategori') }}/{{$item->foto}}" alt="">
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Upload image category</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea name="keterangan" class="tinymce-basic form-control">{{$item->keterangan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    
@endsection
