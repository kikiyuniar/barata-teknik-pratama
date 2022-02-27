@extends('dashboard.master_dashboard.head')
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="card-inner">
                        <div class="preview-block">
                            <div class="row gy-4">
                                <div class="col-sm-12">
                                    <div class="card card-preview">
                                        <div class="card-inner">
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
                                            
                                            <div class="row g-gs">
                                                <div class="col-md-4">
                                                    <ul class="nav link-list-menu border border-light round m-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#tabItem17"><em class="icon ni ni-user"></em><span>Profile</span></a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#tabItem18"><em class="icon ni ni-users"></em><span>Register</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tabItem17">
                                                            <div class="row">
                                                                <div class="col-md-4 d-flex justify-content-center">
                                                                    <img height="170rem" width="170rem" src="{{ URL::asset('img_profile') }}/{{Auth::user()->foto}}" alt="">
                                                                </div>
                                                                <div class="col-md-8 mt-2">
                                                                    <div class="card text-black bg-lighter">
                                                                        <div class="card-header">{{Auth::user()->name}}</div>
                                                                        <div class="card-inner">
                                                                            <label class="form-label"> Email</label>
                                                                            <h5 class="card-title">{{Auth::user()->email}}</h5>
                                                                            <a href="#" class="btn btn-dim btn-info" data-toggle="modal" data-target="#modalAkun{{Auth::user()->id}}">Edit</a>
                                                                            <a href="#" class="btn btn-dim btn-info" data-toggle="modal" data-target="#modalPassword{{Auth::user()->id}}">Edit Password</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tabItem18">
                                                            <div class="card">
                                                                <div class="card-inner card-inner-lg">
                                                                    <div class="nk-block-head">
                                                                        <div class="nk-block-head-content">
                                                                            <h4 class="nk-block-title">Register</h4>
                                                                            <div class="nk-block-des">
                                                                                <p>Create New Admin Account</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <form action="{{url('register')}}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="name">Name</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control xform-control-lg" id="name"
                                                                                    placeholder="Enter your name" name="name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="email">Email or Username</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control form-control-lg" id="email"
                                                                                    placeholder="Enter your email address or username" name="email">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="form-label" for="password">Password</label>
                                                                            <div class="form-control-wrap">
                                                                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                                                                                    data-target="password">
                                                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                                                </a>
                                                                                <input type="password" class="form-control form-control-lg" id="password"
                                                                                    placeholder="Enter your password" name="password">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                                                            <div class="form-control-wrap">
                                                                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                                                                                    data-target="password_confirmation">
                                                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                                                </a>
                                                                                <input type="password" class="form-control form-control-lg"
                                                                                    id="password_confirmation" placeholder="Confirm Password"
                                                                                    name="password_confirmation">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="custom-control custom-control-xs custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="checkbox">
                                                                                <label class="custom-control-label" for="checkbox">I agree to Dashlite <a href="#">Privacy Policy</a> &amp; <a href="#"> Terms.</a></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button class="btn btn-lg btn-primary btn-block">Register</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="preview-hr">
                                            <table class="datatable-init table">
                                                <thead>
                                                    <tr class="tb-odr-item">
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Picture</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tb-odr-body">
                                                    @foreach ($user as $item)
                                                    <tr class="tb-odr-item">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td> 
                                                        <td><img src="{{ URL::asset('img_profile') }}/{{$item->foto}}" alt="" width="100"></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li>
                                                                            <a href="#" data-toggle="modal" data-target="#modalAkun{{$item->id}}" class="text-primary">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="text-warning" data-toggle="modal" data-target="#modalPassword{{$item->id}}">Edit Password</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="/delete/{{ $item->id }}" onclick="return confirm('Delete {{$item->name}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
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
