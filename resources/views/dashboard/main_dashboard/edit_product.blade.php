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
                <h3>Add Product</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                @foreach ($barang as $item)
                <form action="{{url('action_edit')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$item->id}}" hidden>
                    <div class="form-group">
                        <label class="form-label" for="full-name">Title</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="full-name" name="judul"
                                required value="{{$item->judul}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <img width="100%" src="{{ URL::asset('img_products') }}/{{$item->foto}}" alt="">
                            </div>
                            <a data-bs-toggle="modal" data-bs-target="#modalForm1" class="btn btn-outline-info mb-5">Update Image 1</a>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <img width="100%" src="{{ URL::asset('img_products') }}/{{$item->foto2}}" alt="">
                            </div>
                            <a data-bs-toggle="modal" data-bs-target="#modalForm2" class="btn btn-outline-info mb-5">Update Image 2</a>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <img width="100%" src="{{ URL::asset('img_products') }}/{{$item->foto3}}" alt="">
                            </div>
                            <a data-bs-toggle="modal" data-bs-target="#modalForm3" class="btn btn-outline-info mb-5">Update Image 3</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <div class="form-control-wrap">
                                    <select id="kategori" class="form-select" tabindex="-1"
                                        aria-hidden="true" name="kategori">
                                        <option disabled>Edit Category ... </option>
                                        @foreach ($kategori as $item2)
                                            <option value="{{ $item2->id }}" @if (old('kategori', $item->kategori_id) == $item2->id) selected @endif >{{ $item2->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">Subcategory</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" tabindex="-1" aria-hidden="true"
                                        name="subkategori" id="subkategori" required>
                                        <option disabled>Select Sub Category ...</option>
                                        @foreach ($sub as $item2)
                                            <option value="{{ $item2->id }}" @if (old('subkategori', $item->sub_kategori_id) == $item2->id) selected @endif >{{ $item2->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <textarea class="ckeditor form-control" name="keterangan">{{$item->keterangan}}</textarea>
                                <script>
                                    CKEDITOR.replace( 'keterangan' );
                                </script>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-outline-danger" href="{{ url('list_products') }}">Cancel</a>
                    <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
                </form>
                @endforeach
            </div>
        </div>
    

    <!-- Modal Form Edit foto --> 
    @foreach ($barang as $item)
    <div class="modal fade" id="modalForm1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Image 1</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="{{url('update_img1')}}/{{$item->id}}" class="form-validate is-alter" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Dropzone Image 1</label>
                            <div class="mb-3 form-group files">
                                <input type="file" class="form-control" name="foto" accept="image/*" >
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
    <div class="modal fade" id="modalForm2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Image 2</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="{{url('update_img2')}}/{{$item->id}}" class="form-validate is-alter" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Dropzone Image 2</label>
                            <div class="mb-3 form-group files">
                                <input type="file" class="form-control" name="foto2" accept="image/*" >
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
    <div class="modal fade" id="modalForm3">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Image 3</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form action="{{url('update_img3')}}/{{$item->id}}" class="form-validate is-alter" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Dropzone Image 3</label>
                            <div class="mb-3 form-group files">
                                <input type="file" class="form-control" name="foto3" accept="image/*" >
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
