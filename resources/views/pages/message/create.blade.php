@extends('layout/auth', ['page' => 'messages'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4>Send Message to Device</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Message Logs</a></li>
                <li class="breadcrumb-item active">Send Message</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Send Message to Device</h4>

                <form class="needs-validation" action="{{ route('messages.store') }}" method="POST" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="device_id">Select Device</label>
                                <select class="form-control" id="device_id" name="device_id">
                                    @foreach ($devices as $device)
                                    <option value="{{ $device->device_id }}">{{ $device->name }} ( {{ $device->unique_id }} )</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="message">Message</label>
                                <textarea type="text" class="form-control" id="message" name="message" placeholder="Message Text" maxlength="255" required>{{ old('message') }}</textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
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
<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/notif.js') }}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<!-- Page JS -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#device_id').select2();
    });
</script>
@endpush