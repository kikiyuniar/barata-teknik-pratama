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
                <form action="add_product" method="POST" enctype="multipart/form-data">
                @csrf
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Title</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="full-name" name="judul" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <div class="form-control-wrap">
                                <select class="form-select" id="kategori" tabindex="-1" aria-hidden="true" name="kategori" required>
                                    <option selected disabled>Select Category ...</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Subcategory</label>
                            <div class="form-control-wrap">
                                <select class="form-select" id="subkategori" tabindex="-1" aria-hidden="true" name="subkategori">
                                    <option selected disabled>Select Subategory ...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-4 mt-3">
                        <div class="form-group">
                            <label class="form-label">Dropzone Image</label>
                            <div class="mb-3 form-group files">
                                <input type="file" class="form-control" name="foto" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <div class="form-group">
                            <label class="form-label">Dropzone Image 2</label>
                            <div class="mb-3 form-group files">
                                <input type="file" class="form-control" name="foto2" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <div class="form-group">
                            <label class="form-label">Dropzone Image 3</label>
                            <div class="mb-3 form-group files">
                                <input type="file" class="form-control" name="foto3" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Dropzone File Catalog (PDF Only)</label>
                    <div class="mb-3 form-group files">
                        <input type="file" class="form-control" name="file" accept="application/pdf" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <textarea name="keterangan" class="ckeditor form-control">Hello, World!</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
            </form>
            </div>
        </div>
    </section>
</div>

@endsection
