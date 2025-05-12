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
                            <li class="breadcrumb-item" aria-current="page">User</li>
                            <li class="breadcrumb-item" aria-current="page">Profile</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Profile</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="row">
            <div class="col-lg-4 col-xxl-3">
                <div class="card">
                <div class="card-body position-relative">
                    <div class="text-center mt-3">
                        <div class="chat-avtar d-inline-flex mx-auto">
                                @if(Auth::user()->image)
                                <img src="{{asset('storage/profile/'.Auth::user()->image)}}" alt="{{ Auth::user()->name }}" class="rounded-circle img-fluid wid-70"">
                                @endif
                            </div>
                            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                            <p class="text-muted text-sm">{{ Auth::user()->role == '1' ? 'Admin':'User' }}</p>
                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                <i class="ti ti-mail me-2"></i>
                                <p class="mb-0">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                <i class="ti ti-phone me-2"></i>
                                <p class="mb-0">(+62) 831 9212 4827</p>
                            </div>
                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                <i class="ti ti-map-pin me-2"></i>
                                <p class="mb-0">Jambi City</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xxl-9">
                <div class="card">
                    <div class="card-header">
                        <h5>Personal Details</h5>
                    </div>
                    <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 pt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1 text-muted">Full Name</p>
                                    <p class="mb-0">Anshan Handgun</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1 text-muted">Country</p>
                                    <p class="mb-0">Jambi City</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1 text-muted">Email</p>
                                    <p class="mb-0">anshan.dh81@gmail.com</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1 text-muted">Phone</p>
                                    <p class="mb-0">(+62) 831 9212 4827</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0 pb-0">
                            <p class="mb-1 text-muted">Address</p>
                            <p class="mb-0">Street 110-B Kalians Bag, Dewan, M.P. New York</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
