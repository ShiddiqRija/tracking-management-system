@extends('layout/auth', ['page' => 'devices'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4>Devices</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
                <li class="breadcrumb-item active">Devices</li>
            </ol>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="d-flex justify-content-end">
            <a href="{{ route('devices.create') }}">
                <button type="button" class="btn btn-primary waves-effect waves-light">
                    <i class="mdi mdi-plus me-1"></i>
                    Add Device
                </button>
            </a>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Device Lists</h4>

                <table id="devices-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Device Name</th>
                            <th>Unique Id</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th>Contact</th>
                            <th>Heart Rate</th>
                            <th>Weather Temp.</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Action Notif -->
<link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Action Notif -->
<script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/notif.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#devices-table').DataTable({
            ajax: {
                url: '{{ route("device-list") }}'
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false
            }, {
                data: 'name',
                name: 'name'
            }, {
                data: 'unique_id',
                name: 'unique_id'
            }, {
                data: 'status',
                name: 'status'
            }, {
                data: 'phone',
                name: 'phone'
            }, {
                data: 'contact',
                name: 'contact'
            }, {
                data: 'heartRate',
                name: 'heartRate'
            }, {
                data: 'tempWeather',
                name: 'tempWeather'
            }],
            columnDefs: [{
                targets: 1,
                data: 'name',
                render: function(data, type, row, meta) {
                    return `<a href="/devices/${row.id }/edit">${data}</a>`
                }
            }],
        });
    })
</script>
@endpush