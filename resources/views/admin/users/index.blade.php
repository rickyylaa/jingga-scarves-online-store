@extends('layouts.admin.app')

@section('title')
    <title>Jingga Scarves</title>
@endsection

@section('content')
<!-- Main Content Start -->
<div class="pc-container">
    <div class="pc-content">

        <!-- Breadcrumb Start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Pages</a></li>
                            <li class="breadcrumb-item" aria-current="page">User</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">User</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- Extra small table start-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>User</h5>
                        <button type="button" class="btn btn-icon btn-primary rounded bg-primary" data-bs-toggle="modal" data-bs-target=".addnewuser">
                            <i class="ti ti-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible mb-0" role="alert">
                                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Success</h6>
                                <p class="mb-0">{{ session('success') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible mb-0" role="alert">
                                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error</h6>
                                <p class="mb-0">{{ session('error') }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table class="table dataTable-table" id="pc-dt-simple">
                                        <thead>
                                            <tr>
                                                <th data-sortable="" style="width: 7.7374%;">
                                                    #
                                                </th>
                                                <th data-sortable="" style="width: 19.9297%;">
                                                    Nama
                                                </th>
                                                <th data-sortable="" style="width: 28.3705%;">
                                                    Email
                                                </th>
                                                <th data-sortable="" style="width: 14.7714%;">
                                                    Role
                                                </th>
                                                <th data-sortable="" style="width: 14.5369%;">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($user) && $user->count())
                                            @foreach($user as $key => $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{!! $row->status_label !!}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical f-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{ route('user.destroy', $row->id) }}" method="post">
                                                            @csrf
                                                                @method('DELETE')
                                                                <a href="{{ route('user.edit', $row->id) }}" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                                                <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6" class="text-center">No data available in table</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="dataTable-bottom">
                                    <div class="dataTable-info">
                                        Showing {{ $user->firstItem() }} to {{ $user->lastItem() }} of {{ $user->total() }} entries
                                    </div>
                                    <nav class="dataTable-pagination">
                                        <ul class="dataTable-pagination-list">
                                            {!! $user->links('pagination::bootstrap-4') !!}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Extra small table start-->
        </div>
        <!-- [ Main Content ] end -->

        <div class="modal fade addnewuser" tabindex="-1" role="dialog" aria-labelledby="addnewuserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="addnewuserLabel">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.store') }}" class="row g-3" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{ old('name') }}" required>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="name">Email</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{ old('name') }}" required>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="name">Password</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{ old('name') }}" required>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="name">Confirm Password</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{ old('name') }}" required>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--  Main Content End -->
    </div>
</div>
<!--  Main Content End -->
@endsection
