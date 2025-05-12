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
                            <li class="breadcrumb-item" aria-current="page">Produk</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Produk</h2>
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
                        <h5>Produk</h5>
                        <button type="button" class="btn btn-icon btn-primary rounded bg-primary" data-bs-toggle="modal" data-bs-target=".addnewproduct">
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
                                    <table class="table dataTable-table">
                                        <thead>
                                            <tr>
                                                <th data-sortable="" style="width: 19.9297%;">
                                                    Produk
                                                </th>
                                                <th data-sortable="" style="width: 28.3705%;">
                                                    Rincian
                                                </th>
                                                <th data-sortable="" style="width: 14.7714%;">
                                                    Harga
                                                </th>
                                                <th data-sortable="" style="width: 14.6542%;">
                                                    Status
                                                </th>
                                                <th data-sortable="" style="width: 14.5369%;">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($product) && $product->count())
                                            @foreach($product as $key => $row)
                                            <tr>
                                                <td><img src="{{ asset('storage/products/' .$row->image) }}" width="100px" height="100px" alt="{{ $row->name }}"></td>
                                                <td><b>{{ $row->name }}</b><br>
                                                    <small>Kategori: {{ $row->category->name }}<br>
                                                            Quantity: {{ $row->qty }} pcs<br>
                                                            Berat: {{ $row->weight }} gr<br>
                                                    </small>
                                                </td>
                                                <td>Rp {{ number_format($row->price) }}</td>
                                                <td>{!! $row->status_label !!}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical f-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{ route('product.destroy', $row->id) }}" method="post">
                                                                @csrf
                                                                    @method('DELETE')
                                                                    <a href="{{ route('product.edit', $row->id) }}" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i>Edit</a>
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
                                        Showing {{ $product->firstItem() }} to {{ $product->lastItem() }} of {{ $product->total() }} entries
                                    </div>
                                    <nav class="dataTable-pagination">
                                        <ul class="dataTable-pagination-list">
                                            {!! $product->links('pagination::bootstrap-4') !!}
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

        <div class="modal fade addnewproduct" tabindex="-1" role="dialog" aria-labelledby="addNewProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="addNewProductLabel">Tambah Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <ul class="nav nav-tabs analytics-tab" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab" data-bs-target="#analytics-tab-1-pane" type="button" role="tab" aria-controls="analytics-tab-1-pane" aria-selected="true">Products</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="analytics-tab-2" data-bs-toggle="tab" data-bs-target="#analytics-tab-2-pane" type="button" role="tab" aria-controls="analytics-tab-2-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="analytics-tab-3" data-bs-toggle="tab" data-bs-target="#analytics-tab-3-pane" type="button" role="tab" aria-controls="analytics-tab-3-pane" aria-selected="false">Images</button>
                        </li>
                    </ul>
                    <form action="{{ route('product.store') }}" class="row g-3" method="post" enctype="multipart/form-data" >
                    @csrf
                        <div class="modal-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}" required>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="category_id">Kategori</label>
                                        <select name="category_id" class="form-select">
                                            <option value="">Select</option>
                                            @foreach ($category as $row)
                                            <option value="{{ $row->id }}" {{ old('category_id') == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="color">Warna</label>
                                        <input type="text" name="color" class="form-control" placeholder="Warna" value="{{ old('color') }}" required>
                                        <p class="text-danger">{{ $errors->first('color') }}</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="description">Deskripsi</label>
                                        <textarea name="description" id="autosize-demo" rows="3" class="form-control" rows="4" placeholder="Deskripsi">{{ old('description') }}</textarea>
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel" aria-labelledby="analytics-tab-2" tabindex="0">
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="price">Harga</label>
                                        <input type="number" name="price" class="form-control" placeholder="Harga" value="{{ old('price') }}" required>
                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="material">Bahan</label>
                                        <input type="text" name="material" class="form-control" placeholder="Bahan" value="{{ old('material') }}" required>
                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="size">Size</label>
                                        <input type="text" name="size" class="form-control" placeholder="Size" value="{{ old('size') }}" required>
                                        <p class="text-danger">{{ $errors->first('size') }}</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="qty">Quantity</label>
                                        <input type="number" name="qty" class="form-control" placeholder="Quantity" value="{{ old('qty') }}" required>
                                        <p class="text-danger">{{ $errors->first('qty') }}</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="weight">Berat</label>
                                        <input type="number" name="weight" class="form-control" placeholder="Berat" value="{{ old('weight') }}" required>
                                        <p class="text-danger">{{ $errors->first('weight') }}</p>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="0" {{ old('status') == '0' ? 'selected':'' }}>New</option>
                                            <option value="1" {{ old('status') == '1' ? 'selected':'' }}>Sale</option>
                                            <option value="2" {{ old('status') == '2' ? 'selected':'' }}>Hot</option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="analytics-tab-3-pane" role="tabpanel" aria-labelledby="analytics-tab-3" tabindex="0">
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="image">Upload Produk</label>
                                        <input type="file" name="image" class="form-control" value="{{ old('image') }}" multiple="multiple">
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--  Main Content End -->
    </div>
</div>
<!--  Main Content End -->
@endsection
