@extends('layout/auth', ['page' => 'messages'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4>Message Logs</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
                <li class="breadcrumb-item active">Messages Logs</li>
            </ol>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="d-flex justify-content-end">
            <a href="{{ route('messages.create') }}">
                <button type="button" class="btn btn-primary waves-effect waves-light">
                    <i class="mdi mdi-plus me-1"></i>
                    Send Message
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
                <h4 class="card-title">Message Logs</h4>

                <table id="messages-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Device Name</th>
                            <th>Unique Id</th>
                            <th>Message</th>
                            <th>Send Time</th>
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
        $('#messages-table').DataTable({
            ajax: {
                url: '{{ route("message-list") }}'
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false
            }, {
                data: 'deviceName',
                name: 'deviceName'
            }, {
                data: 'unique_id',
                name: 'unique_id'
            }, {
                data: 'message',
                name: 'message'
            }, {
                data: 'send_time',
                name: 'send_time'
            }]
        });
    })
</script>
@endpush