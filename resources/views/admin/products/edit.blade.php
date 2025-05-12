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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Produk</a></li>
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
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Edit Produk</h5>
                    <button type="button" class="btn btn-icon btn-primary rounded bg-primary" data-bs-toggle="modal" data-bs-target=".imageproduct">
                        <i class="ti ti-paint"></i>
                    </button>
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
                <form class="row g-3" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{  $product->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="category_id">Kategori</label>
                                    <select name="category_id" class="form-select">
                                        <option value="">Select</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->id }}" {{ $product->category_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="color">Warna</label>
                                    <input type="text" name="color" class="form-control" placeholder="Warna" value="{{ $product->color }}" required>
                                    <p class="text-danger">{{ $errors->first('color') }}</p>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Description">{{  $product->description }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel" aria-labelledby="analytics-tab-2" tabindex="0">
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="price">Harga</label>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="material">Bahan</label>
                                    <input type="text" name="material" class="form-control" placeholder="Bahan" value="{{ $product->material }}" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="size">Size</label>
                                    <input type="text" name="size" class="form-control" placeholder="Size" value="{{ $product->size }}" required>
                                    <p class="text-danger">{{ $errors->first('size') }}</p>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="qty">Quantity</label>
                                    <input type="number" name="qty" id="qty" class="form-control" placeholder="Quantity" value="{{ $product->qty }}" required>
                                    <p class="text-danger">{{ $errors->first('qty') }}</p>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="weight">Berat</label>
                                    <input type="number" name="weight" id="weight" class="form-control" placeholder="Berat" value="{{ $product->weight }}" required>
                                    <p class="text-danger">{{ $errors->first('weight') }}</p>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="status" name="status" class="form-select">
                                        <option value="0" {{ $product->status == '0' ? 'selected':'' }}>New</option>
                                        <option value="1" {{ $product->status == '1' ? 'selected':'' }}>Sale</option>
                                        <option value="2" {{ $product->status == '2' ? 'selected':'' }}>Hot</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="analytics-tab-3-pane" role="tabpanel" aria-labelledby="analytics-tab-3" tabindex="0">
                                <div class="col-12 col-md-12">
                                    <label class="form-label" for="image">Upload Produk</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ url('admin/product') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!--  Main Content End -->

        <div class="modal fade imageproduct" tabindex="-1" role="dialog" aria-labelledby="imageProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-md">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="my-4 py-2 text-center">
                            <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="300px" height="300px">
                        </div>
                        <div class="text-center mt-3">
                            <div class="mb-2 d-flex justify-content-center">
                                <sup class="h5 pricing-currency mt-3 mb-0 me-1"></sup>
                                <h1 class="fw-bold h1 mb-0"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Main Content End -->
@endsection
