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
                <h3>Products Management</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <a class="btn btn-primary mb-3" href="slide_add">Add Slides</a>
                </div>
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
                <hr>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Images</th>
                            <th>Descriptions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slide as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td><img src="{{ URL::asset('img_slide') }}/{{$item->foto}}" alt="" width="100"></td>
                            <td>{!! Str::limit( strip_tags($item->keterangan),50)!!}</td>
                            <td>
                                <a href="/edit_slide/{{ $item->id }}" class="text-primary">Edit</a>
                                <a href="/del_slide/{{ $item->id }}" onclick="return confirm('Delete {{$item->Title}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
