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
                <h3>Contact Messages</h3>
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
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date time</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Messages</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="badge bg-primary">{{ date('l, d F Y', strtotime($item->updated_at))}}</span> 
                                <span class="badge bg-success">{{ date('H:i', strtotime($item->updated_at))}}</span>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->subjek }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{!! Str::limit( strip_tags($item->pesan),50)!!}</td>
                            <td>
                                <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#modalContact{{$item->id}}">Show</a>
                                <a href="/del_contact/{{ $item->id }}" onclick="return confirm('Delete {{$item->name}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
