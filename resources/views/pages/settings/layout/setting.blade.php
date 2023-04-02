@extends('layout/auth', ['page' => 'settings'])

@section('content')
<div class="row">

    @yield('breadcrumb')

</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-3">
        <div class="list-group" id="deviceList" style="max-height: 78vh; overflow-y: auto;">

            <a href="{{ route('accounts.index') }}" class="list-group-item list-group-item-action {{ $menu == 'accounts' ? 'active' : '' }}" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <div>
                        <h5>Manage Accounts</h5>
                    </div>
                </div>
            </a>

            <a href="#" class="list-group-item list-group-item-action {{ $menu == 'roles' ? 'active' : '' }}" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <div>
                        <h5>Manage Roles</h5>
                    </div>
                </div>
            </a>

        </div>
    </div>

    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                @yield('setting-content')
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
@stack('css-settings')
<link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
@stack('script-settings')
<!-- Action Notif -->
<script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/notif.js') }}"></script>
@endpush