@extends('layout/auth', ['page' => 'tracking'])

@section('content')
<div class="row">
    <div class="col-xl-9">
        <div id="map" style="height: 88vh;"></div>
    </div>

    <div class="col-xl-3 vh-84">
        <div class="card">
            <div class="card-body">

                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="device">Device</label>
                        <select id="device" name="device" class="form-control" required>
                            @foreach ($devices as $device)
                            <option value="{{ $device->device_id }}">{{ $device->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="period">Period</label>
                        <select id="period" name="period" class="form-control" required>
                            <option value="Today">Today</option>
                            <option value="Custom">Custom</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary waves-effect waves-light">
                        Show Replay
                    </button>
                </div>

            </div>
        </div>
    </div>

    @endsection

    @push('css')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Action Notif -->
    <link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .page-content {
            padding: calc(70px + 24px) calc(24px / 2) 0px calc(24px / 2);
        }
    </style>
    @endpush

    @push('script')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <!-- Action Notif -->
    <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/notif.js') }}"></script>
    <!-- google maps api -->
    <!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyB5OXoMmPKwLbrSWAF8D2cp_yP0lDS8oPo"></script> -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCMuyTDQ4zd__ZPPja86kIefxTcK2fiqVE"></script>
    <!-- Gmaps file -->
    <script src="{{ asset('assets/libs/gmaps/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/libs/gmaps/markerCluster.js') }}"></script>
    <!-- Page JS -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#device').select2();
            $('#period').select2();
        });
    </script>
    <!-- GMaps init -->
    <script type="text/javascript">
        $(document).ready(function() {
            var map;

            map = new GMaps({
                div: '#map',
                lat: 1.1134006,
                lng: 104.0652815,
                zoom: 11,
                disableDefaultUI: true,
            });

        });
    </script>
    @endpush