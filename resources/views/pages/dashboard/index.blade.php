@extends('layout/auth', ['page' => 'dashboard'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4>Dashboard</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-watch-variant float-end"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Device Registered</h6>
                    <h2 class="mb-4 text-white">1</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-watch-variant float-end"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Device Active</h6>
                    <h2 class="mb-4 text-white">1</h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

