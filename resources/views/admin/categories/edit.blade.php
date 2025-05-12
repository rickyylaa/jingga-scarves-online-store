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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Kategori</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Edit</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Kategori</h5>
                </div>
                <form class="row g-3" action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{ $category->name }}" required>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="parent_id">Parent</label>
                            <select id="parent_id" name="parent_id" class="form-select">
                                <option value="">Select</option>
                                @foreach ($parent as $row)
                                <option value="{{ $row->id }}" {{ $category->parent_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ url('admin/category') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!--  Main Content End -->
    </div>
</div>
<!--  Main Content End -->
@endsection
