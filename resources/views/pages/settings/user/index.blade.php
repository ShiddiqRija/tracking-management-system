@extends('pages/settings/layout/setting', ['menu' => 'accounts'])

@section('breadcrumb')
<div class="col-sm-6">
    <div class="page-title-box">
        <h4>Manage Account</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
            <li class="breadcrumb-item active">Manage Account</li>
        </ol>
    </div>
</div>

<div class="col-sm-6">
    <div class="d-flex justify-content-end">
        <a href="{{ route('accounts.create') }}">
            <button type="button" class="btn btn-primary waves-effect waves-light">
                <i class="mdi mdi-plus me-1"></i>
                Add Account
            </button>
        </a>
    </div>
</div>
@endsection

@section('setting-content')
<h4 class="card-title">Account Lists</h4>

<table id="users-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
</table>
@endsection

@push('css-settings')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('script-settings')
<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#users-table').DataTable({
            ajax: {
                url: '{{ route("user-list") }}'
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false
            }, {
                data: 'name',
                name: 'name'
            }, {
                data: 'email',
                name: 'email'
            }, {
                data: 'role',
                name: 'role'
            }],
            columnDefs: [{
                targets: 1,
                data: 'name',
                render: function(data, type, row, meta) {
                    return `<a href="/settings/accounts/${row.id }/edit">${data}</a>`
                }
            }],
        });
    })
</script>
@endpush