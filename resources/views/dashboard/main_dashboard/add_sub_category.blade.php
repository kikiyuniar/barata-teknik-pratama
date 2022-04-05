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
                <h3>Subcategory Management</h3>
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
                {{-- <div class="form-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">Add Category</button>
                </div> --}}
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormsubkategori">Add Sub Category</button>
                </div>
                <hr>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name Sub Category</span></th>
                            <th>Category</th>
                            <th>Image</span></th>
                            <th>Description</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subkategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->kate_name }}</td>
                            <td>
                                <img src="{{ URL::asset('img_subkategori') }}/{{$item->foto}}" alt="" width="100">
                            </td>
                            <td>{!! Str::limit( strip_tags($item->keterangan),50)!!}</td>
                            <td>
                                <a class="text-primary" data-bs-toggle="modal" data-bs-target="#modalForm{{ $item->slug_sub }}">Edit</a>
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
    

    <!-- Modal Form Sub Kategori -->
    <div class="modal fade" id="modalFormsubkategori">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Insert Sub Category</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="add_sub_category" class="form-validate is-alter" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Select Category</label>
                            <div class="form-control-wrap">
                                <select class="form-select" tabindex="-1" aria-hidden="true" name="kategori" required>
                                    <option selected disabled>Select Category ...</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Name Sub Category</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="full-name" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Upload Image subcategory</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" name="foto" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea name="keterangan" class="tinymce-basic form-control">Hello, World!</textarea>
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

    <!-- Modal Edit Form Sub Kategori -->
    @foreach ($subkategori as $item)
    <div class="modal fade" id="modalForm{{$item->slug_sub}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Subcategory</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="edit_subcategory/{{ $item->id }}" class="form-validate is-alter" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="full-name">Name Sub Category</label>
                            <div class="form-control-wrap">
                                <input id="subkategori" type="text" value="{{$item->name}}" class="form-control" id="full-name" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <div class="form-control-wrap">
                                <select name="kategori" class="form-select" data-search="on" required>
                                    @foreach ($kategori as $item2)
                                        <option value="{{ $item2->id }}" @if (old('kategori', $item->kategori_id) == $item2->id) selected @endif>{{ $item2->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label" >Image Now</label>
                                <img width="100%" src="{{ URL::asset('img_subkategori') }}/{{$item->foto}}" alt="">
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Upload image subcategory</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- <div class="row mt-3"> --}}
                            {{-- <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Selected Category</label>
                                    <div class="form-control-wrap">
                                        <input disabled type="text" value="{{$item->kate_name}}" class="form-control" id="full-name" required>
                                    </div>
                                </div>
                            </div>
                            <input type="text" value="{{$item->kategori_id}}" name="kategori" hidden> --}}
                           
                            {{-- <div class="col-8"> --}}
                         {{--   </div>
                         </div> --}}
                        <div class="form-group mt-3">
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

        <!-- Modal Form Sub Kategori -->
    {{-- @foreach ($subkategori as $item)
    <div class="modal fade" id="modalForm{{ $item->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sub Category</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="action_edit_kate/{{ $item->id }}" class="form-validate is-alter" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <div class="form-control-wrap">
                                <select class="custom-select" id="kategori" tabindex="-1" aria-hidden="true" name="kategori" required>
                                    <option selected disabled>Select Category ...</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
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
    @endforeach --}}

    
@endsection
