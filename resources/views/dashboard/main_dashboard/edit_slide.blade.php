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
                @foreach ($slide as $item)
                <form action="{{url('slide_pushedit')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$item->id}}" hidden>
                    <div class="form-group">
                        <label class="form-label" for="full-name">Title</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="full-name" name="judul" required value="{{$item->judul}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-label">Selected Image</label>
                            <div class="form-group">
                                <img width="100%" src="{{ URL::asset('img_slide') }}/{{$item->foto}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label">Dropzone Image</label>
                                <div class="mb-3 form-group files">
                                    <input type="file" class="form-control" name="foto" value="{{ URL::asset('img_slide') }}/{{$item->foto}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <textarea required name="keterangan" class="ckeditor form-control">{{$item->keterangan}}</textarea>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-outline-danger" href="{{ url()->previous() }}">Back</a>
                    <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
                </form>
                @endforeach
            </div>
        </div>

@endsection
