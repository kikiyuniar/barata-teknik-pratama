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
                <h3>Profile Management</h3>
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="true">Profile</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                    aria-selected="false">Register</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="row">
                                    <div class="col-md-4 d-flex justify-content-center">
                                        <img height="170rem" width="170rem" src="{{ URL::asset('img_profile') }}/{{Auth::user()->foto}}" alt="">
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <div class="card text-black bg-lighter">
                                            <div>{{Auth::user()->name}}</div>
                                            <div class="card-inner">
                                                <label class="form-label"> Email</label>
                                                <h5 class="card-title">{{Auth::user()->email}}</h5>
                                                <a href="#" class="btn btn-dim btn-info" data-bs-toggle="modal" data-bs-target="#modalAkun{{Auth::user()->id}}">Edit</a>
                                                <a href="#" class="btn btn-dim btn-info" data-bs-toggle="modal" data-bs-target="#modalPassword{{Auth::user()->id}}">Edit Password</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="{{url('register')}}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Name</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input name="name" type="text" class="form-control" placeholder="Name" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Email</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input name="email" type="email" class="form-control" placeholder="Email" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-envelope"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Password</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Confirm Password</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-8 offset-md-4">
                                                            <div class='form-check'>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox2"
                                                                        class='form-check-input' checked>
                                                                    <label for="checkbox2">Remember Me</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td> 
                            <td><img src="{{ URL::asset('img_profile') }}/{{$item->foto}}" alt="" width="100"></td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAkun{{$item->id}}" class="text-primary">Edit</a>
                                <a href="#" class="text-warning" data-bs-toggle="modal" data-bs-target="#modalPassword{{$item->id}}">Edit Password</a>
                                <a href="/delete/{{ $item->id }}" onclick="return confirm('Delete {{$item->name}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@foreach ($user as $item)
<div class="modal fade" tabindex="-1" id="modalAkun{{$item->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
            </div>
            <div class="modal-body">
                <form action="{{url('edit_profile')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="" hidden>
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <div class="mb-3 form-group">
                            <input type="text" class="form-control" name="name" value="{{$item->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="mb-3 form-group">
                            <input type="email" class="form-control" name="email" value="{{$item->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Images</label>
                        <div class="mb-3 form-group">
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary"><em class="far fa-paper-plane"></em>Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($user as $item)
<div class="modal fade" tabindex="-1" id="modalPassword{{$item->id}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Edit Pasword</h5>
            </div>
            <div class="modal-body">
                <form action="{{url('edit_profile')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="" hidden>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="mb-3 form-group">
                            <input type="password" class="form-control" name="password">
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
