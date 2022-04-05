@extends('dashboard.master_dashboard.head')
@section('main')
{{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script> --}}
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Front Managements</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <hr>
                <div class="list-group list-group-horizontal-sm mb-1 text-center"role="tablist">
                    <a class="list-group-item list-group-item-action active"
                        id="list-sunday-list" data-bs-toggle="list" href="#list-sunday"
                        role="tab">Home</a>
                    <a class="list-group-item list-group-item-action" id="list-monday-list"
                        data-bs-toggle="list" href="#list-monday" role="tab">About Us</a>
                    <a class="list-group-item list-group-item-action" id="list-tuesday-list"
                        data-bs-toggle="list" href="#list-tuesday" role="tab">Our Business</a>
                    <a class="list-group-item list-group-item-action" id="list-products-list"
                        data-bs-toggle="list" href="#list-products" role="tab">Our Products and Services</a>
                    <a class="list-group-item list-group-item-action" id="list-vision-list"
                        data-bs-toggle="list" href="#list-vision" role="tab">Vision and Mission</a>
                </div>
                <div class="tab-content text-justify">
                    <div class="tab-pane fade show active" id="list-sunday" role="tabpanel" aria-labelledby="list-sunday-list">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                    @foreach ($home as $item)
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="badges">
                                                    <span class="badge bg-primary">Updated {{$item->updated_at->diffForHumans()}}</span>
                                                </div>
                                                <p class="card-text">{!! preg_replace('#<br\s*/?>#', "\n",nl2br($item->keterangan,true)) !!}</p>
                                                <a class="btn btn-dim btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalHome{{$item->id}}">Edit</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-monday" role="tabpanel" aria-labelledby="list-monday-list">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        @foreach ($about as $item)
                                        <div class="col-md-4 mt-4">
                                            <img src="{{ URL::asset('img_about') }}/{{$item->foto}}" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <div class="badges">
                                                    <span class="badge bg-primary">Updated {{$item->updated_at->diffForHumans()}}</span>
                                                </div>
                                                <h5 class="card-title">{{$item->judul}}</h5>
                                                <p class="card-text">{!! strip_tags($item->keterangan) !!}</p>
                                                <a class="btn btn-dim btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalAbout{{$item->id}}">Edit</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-tuesday" role="tabpanel" aria-labelledby="list-tuesday-list">
                        <div class="row">
                            @foreach ($business as $item)
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$item->judul}}</h4>
                                            <p class="card-text">{!! strip_tags($item->keterangan) !!}</p>
                                            <small class="text-muted">Last updated {{$item->updated_at->diffForHumans()}}</small>
                                        </div>
                                        <img class="card-img-bottom img-fluid" src="{{ URL::asset('img_business') }}/{{$item->foto}}"
                                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                                    </div>
                                    <a class="btn btn-dim btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalBusiness{{$item->id}}">Edit</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-products" role="tabpanel" aria-labelledby="list-products-list">
                        @foreach ($service as $item)
                        <div class="accordion-inner">
                            <p>{!! nl2br($item->keterangan) !!}</p>
                            <span class="badge badge-pill badge-primary">Updated {{$item->updated_at->diffForHumans()}}</span>
                            <a class="btn btn-dim btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalService{{$item->id}}">Edit</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="list-vision" role="tabpanel" aria-labelledby="list-vision-list">
                        <div class="row">
                            @foreach ($vision as $item)
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-inner">
                                        <h5 class="card-title">{{$item->judul}}</h5>
                                        <p class="card-text">{!! $item->keterangan !!}</p>
                                        <span class="badge badge-pill badge-primary">Updated {{$item->updated_at->diffForHumans()}}</span><br><br>
                                        <a class="btn btn-dim btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalVision{{$item->id}}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


    {{-- modal edit about --}}
    @foreach ($about as $item)
    <div class="modal fade" tabindex="-1" id="modalAbout{{$item->id}}">
       
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit About</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('edit_about')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <input type="text" name="id" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <div class="mb-3 form-group">
                                <input type="text" class="form-control" name="judul" required value="{{$item->judul}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Dropzone Foto</label>
                            <div class="mb-3 form-group files">
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea name="keterangan" class="ckeditor form-control" placeholder="Input Description...." required>{{$item->keterangan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($business as $item)
    <div class="modal fade" tabindex="-1" id="modalBusiness{{$item->id}}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Business</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('edit_business')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <input type="text" name="id" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <div class="mb-3 form-group">
                                <input type="text" class="form-control" name="judul" required value="{{$item->judul}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Dropzone Image</label>
                            <div class="mb-3 form-group files">
                                <input type="file" class="form-control" name="foto" accept="image/*" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea name="keterangan" class="ckeditor form-control" placeholder="Input Description...." required>{{$item->keterangan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($service as $item)
    <div class="modal fade" tabindex="-1" id="modalService{{$item->id}}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit PRODUCTS AND SERVICES</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('edit_service')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <input type="text" name="id" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea style="display: none;" name="keterangan" class="ckeditor form-control" placeholder="Input Description...." required>{{$item->keterangan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($vision as $item)
    <div class="modal fade" tabindex="-1" id="modalVision{{$item->id}}">
       
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Vision and Mission</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('edit_vision')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <input type="text" name="id" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <div class="mb-3 form-group">
                                <input type="text" class="form-control" name="judul" required value="{{$item->judul}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea class="ckeditor form-control" name="keterangan">{{$item->keterangan}}</textarea>
                                    {{-- <script>
                                        CKEDITOR.replace( 'keterangan' );
                                    </script> --}}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($home as $item)
    <div class="modal fade" tabindex="-1" id="modalHome{{$item->id}}">
       
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Home</h5>
                </div>
                <div class="modal-body">
                    <form action="{{url('edit_home')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <input type="text" name="id" value="{{$item->id}}" hidden>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea id="home1" class="form-control" name="keterangan">{{$item->keterangan}}</textarea>
                                    <script>
                                        CKEDITOR.replace( 'home1',{
                                            on: {
                                                instanceReady: function( ev ) {
                                                     ev.editor.dataProcessor.writer.selfClosingEnd = '>';
                                                }
                                            }
                                        } );
                                    </script>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
