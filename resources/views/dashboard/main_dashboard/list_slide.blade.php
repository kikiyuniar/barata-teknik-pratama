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
                                    <a class="btn btn-primary mb-3" href="slide_add">Add Slides</a>
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
                                            <table class="datatable-init table">
                                                <thead>
                                                    <tr class="tb-odr-item">
                                                        <th>No</th>
                                                        <th>Title</th>
                                                        <th>Images</th>
                                                        <th>Descriptions</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tb-odr-body">
                                                    @foreach ($slide as $item)
                                                    <tr class="tb-odr-item">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->judul }}</td>
                                                        <td><img src="{{ URL::asset('img_slide') }}/{{$item->foto}}" alt="" width="100"></td>
                                                        <td>{!! Str::limit( strip_tags($item->keterangan),50)!!}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li>
                                                                            <a href="/edit_slide/{{ $item->id }}" class="text-primary">Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="/del_slide/{{ $item->id }}" onclick="return confirm('Delete {{$item->Title}} Are you sure?,\nYou wont be able to revert this!?')" class="text-danger">Remove</a>
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

@endsection
