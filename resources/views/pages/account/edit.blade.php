@extends('layout/auth', ['page' => 'account'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4>{{$user->name}}</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                <li class="breadcrumb-item active">Edit Password</li>
            </ol>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Password</h4>

                    <form class="needs-validation" action="{{ route('account.update', $user->id) }}" method="POST" novalidate>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="password">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="password"  required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>

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