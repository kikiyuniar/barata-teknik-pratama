@extends('dashboard.master_dashboard.head')
@section('main')
{{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script> --}}

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="card-inner">
                        <div class="preview-block">
                            <div class="row gy-4">
                                <div class="col-sm-12">
                                    <div id="accordion-2" class="accordion accordion-s3">
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        <div class="accordion-item">
                                            <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-21">
                                                <h6 class="title">HOME</h6>
                                                <span class="accordion-icon"></span>
                                            </a>
                                             <div class="accordion-body collapse" id="accordion-item-21" data-parent="#accordion-2">
                                                <div class="accordion-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card mb-3" style="max-width: 540px;">
                                                                <div class="row g-0">
                                                                @foreach ($home as $item)
                                                                    <div class="col-md-8">
                                                                        <div class="card-body">
                                                                            <span class="badge badge-pill badge-primary">Updated {{$item->updated_at->diffForHumans()}}</span>
                                                                            <p class="card-text">{!! preg_replace('#<br\s*/?>#', "\n",nl2br($item->keterangan,true)) !!}</p>
                                                                            {{-- <script>
                                                                                CKEDITOR.on( 'keterangan', function( ev ) {
                                                                                // Ends self-closing tags the HTML4 way, like <br>.
                                                                                ev.editor.dataProcessor.writer.selfClosingEnd = '>';
                                                                            });
                                                                            </script> --}}
                                                                            <a class="btn btn-dim btn-outline-info" data-toggle="modal" data-target="#modalHome{{$item->id}}">Edit</a>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-2-1">
                                                <h6 class="title">ABOUT US</h6>
                                                <span class="accordion-icon"></span>
                                            </a>
                                             <div class="accordion-body collapse" id="accordion-item-2-1" data-parent="#accordion-2">
                                                <div class="accordion-inner">
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
                                                                            <span class="badge badge-pill badge-primary">Updated {{$item->updated_at->diffForHumans()}}</span>
                                                                            <h5 class="card-title">{{$item->judul}}</h5>
                                                                            <p class="card-text">{!! strip_tags($item->keterangan) !!}</p>
                                                                            <a class="btn btn-dim btn-outline-info" data-toggle="modal" data-target="#modalAbout{{$item->id}}">Edit</a>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-2-2">
                                                <h6 class="title">OUR BUSINESS</h6>
                                                <span class="accordion-icon"></span>
                                            </a>
                                            <div class="accordion-body collapse" id="accordion-item-2-2" data-parent="#accordion-2" >
                                                <div class="accordion-inner">
                                                    <div class="row">
                                                        @foreach ($business as $item)
                                                        <div class="col-md-4">
                                                            <div class="card text-black bg-gray-{{$loop->iteration}}00">
                                                                <div class="card-header">Updated {{$item->updated_at->diffForHumans()}}</div>
                                                                <div class="card-inner">
                                                                    <h5 class="card-title">{{$item->judul}}</h5>
                                                                    <img src="{{ URL::asset('img_business') }}/{{$item->foto}}" alt="">
                                                                    <p class="card-text">{!! strip_tags($item->keterangan) !!}</p>
                                                                </div>
                                                                <a class="btn btn-dim btn-outline-gray" data-toggle="modal" data-target="#modalBusiness{{$item->id}}">Edit</a>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-2-3">
                                                <h6 class="title">OUR PRODUCTS AND SERVICES</h6>
                                                <span class="accordion-icon"></span>
                                            </a>
                                            <div class="accordion-body collapse" id="accordion-item-2-3" data-parent="#accordion-2" >
                                                @foreach ($service as $item)
                                                <div class="accordion-inner">
                                                    <p>{!! nl2br($item->keterangan) !!}</p>
                                                    <span class="badge badge-pill badge-primary">Updated {{$item->updated_at->diffForHumans()}}</span><br><br>
                                                    <a class="btn btn-dim btn-outline-gray" data-toggle="modal" data-target="#modalService{{$item->id}}">Edit</a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-2-4">
                                                <h6 class="title">VISION AND MISSION</h6>
                                                <span class="accordion-icon"></span>
                                            </a>
                                            <div class="accordion-body collapse" id="accordion-item-2-4" data-parent="#accordion-2" >
                                                <div class="accordion-inner">
                                                    <div class="row">
                                                        @foreach ($vision as $item)
                                                        <div class="col-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <h5 class="card-title">{{$item->judul}}</h5>
                                                                    <p class="card-text">{!! $item->keterangan !!}</p>
                                                                    <span class="badge badge-pill badge-primary">Updated {{$item->updated_at->diffForHumans()}}</span><br><br>
                                                                    <a class="btn btn-dim btn-outline-gray" data-toggle="modal" data-target="#modalVision{{$item->id}}">Edit</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
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
                                    <textarea name="keterangan" class="tinymce-basic form-control" placeholder="Input Description...." required>{{$item->keterangan}}</textarea>
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
                                    <textarea name="keterangan" class="tinymce-basic form-control" placeholder="Input Description...." required>{{$item->keterangan}}</textarea>
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
                                    <textarea style="display: none;" name="keterangan" class="summernote-basic form-control" placeholder="Input Description...." required>{{$item->keterangan}}</textarea>
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
    {{-- <script>
        CKEDITOR.on( 'keterangan', function( ev ) {
            // Ends self-closing tags the HTML4 way, like <br>.
            ev.editor.dataProcessor.writer.selfClosingEnd = '>';
        });
    </script> --}}
@endsection
