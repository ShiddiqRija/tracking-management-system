@extends('pages/settings/layout/setting', ['menu' => 'accounts'])

@section('breadcrumb')
<div class="col-sm-6">
    <div class="page-title-box">
        <h4>Add new Account</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Account</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
</div>
@endsection

@section('setting-content')
<h4 class="card-title">Add new Account</h4>

<form class="needs-validation" action="{{ route('accounts.store') }}" method="POST" novalidate>
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" value="{{ old('name') }}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@tms.com" value="{{ old('email') }}" required>
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
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label" for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="{{ old('confirm_password') }}" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection

@push('css-settings')
@endpush

@push('script-settings')
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
@endpush