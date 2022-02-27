@extends('dashboard.master_dashboard.head')
@section('main')

<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="card-inner">
                <div class="preview-block">
                    <div class="form-group">
                        <a class="btn btn-primary" href="products">Add Product</a>
                    </div>
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
                                                <th>Date time</th>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Email</th>
                                                <th>Messages</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tb-odr-body">
                                            @foreach ($contact as $item)
                                            <tr class="tb-odr-item">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-primary">{{ date('l, d F Y', strtotime($item->updated_at))}}</span> 
                                                    <span class="badge badge-pill badge-success">{{ date('H:i', strtotime($item->updated_at))}}</span>
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->subjek }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{!! Str::limit( strip_tags($item->pesan),50)!!}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li>
                                                                    <a href="#" class="text-primary" data-toggle="modal" data-target="#modalContact{{$item->id}}">Show</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/del_contact/{{ $item->id }}" onclick="return confirm('Delete {{$item->name}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
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

 @foreach ($contact as $item)
    <div class="modal fade" tabindex="-1" id="modalContact{{$item->id}}">
       
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Contact</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="form-label">Name</label>
                                     <div class="mb-3 form-group">
                                         <input disabled type="text" class="form-control" required value="{{$item->name}}">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="form-label">Subjek</label>
                                     <div class="mb-3 form-group">
                                         <input disabled type="text" class="form-control" required value="{{$item->subjek}}">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="form-label">Email</label>
                                     <div class="mb-3 form-group">
                                         <input disabled type="email" class="form-control" required value="{{$item->email}}">
                                     </div>
                                 </div>
                             </div>
                         </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea disabled name="keterangan" class="form-control" required>{{$item->pesan}}</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
