@extends('layout/auth', ['page' => 'devices'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4>{{ $device->name }}</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Devices</a></li>
                <li class="breadcrumb-item active">Edit Device</li>
            </ol>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="d-flex justify-content-end">
            <form action="{{ route('devices.destroy', $device->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger waves-effect waves-light">
                    <i class="mdi mdi-trash-can me-1"></i>
                    Remove Device
                </button>
            </form>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Device</h4>

                    <form class="needs-validation" action="{{ route('devices.update', $device->id) }}" method="POST" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Device Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="e.g. DDX04" value="{{ $device->name }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="unique_id">Device Identifier</label>
                                    <input type="text" class="form-control" id="unique_id" name="unique_id" placeholder="e.g. 8640456585123645" value="{{ $device->unique_id }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>

                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="e.g. 081234567890" value="{{ $device->phone }}">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="contact">Contact Name</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="e.g. John Doe" value="{{ $device->contact }}">
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="group_id">Group</label>
                                    <input type="text" class="form-control" id="group_id" name="group_id" placeholder="" value="{{ old('group_id') }}">
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @endsection

    @push('css')
    <link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('script')
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/notif.js') }}"></script>
    @endpush