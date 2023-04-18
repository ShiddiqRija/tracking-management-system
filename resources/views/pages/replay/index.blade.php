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
                    <div class="mb-3">
                        <label class="form-label" for="from">From</label>
                        <input class="form-control" type="datetime-local" id="from" name="from">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="mb-3">
                        <label class="form-label" for="to">To</label>
                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="to" name="to">
                    </div>
                </div>

                <div class="col-sm-12">
                    <button type="button" onclick="getRecord()" class="btn btn-primary waves-effect waves-light">
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
            $('#from').closest('.col-sm-12').hide();
            $('#to').closest('.col-sm-12').hide();

            $('#period').on('change', function() {
                if ($(this).val() === 'Custom') {
                    $('#from').closest('.col-sm-12').show();
                    $('#to').closest('.col-sm-12').show();
                    inputFrom();
                    inputTo();
                } else {
                    $('#from').closest('.col-sm-12').hide();
                    $('#to').closest('.col-sm-12').hide();
                }
            });

            function datetimeLocal(datetime) {
                const dt = new Date(datetime);
                dt.setMinutes(dt.getMinutes() - dt.getTimezoneOffset());
                return dt.toISOString().slice(0, 16);
            }

            function inputFrom() {
                const from = document.getElementById('from');
                const now = new Date();
                const year = now.getFullYear();
                const month = (now.getMonth() + 1).toString().padStart(2, '0');
                const day = now.getDate().toString().padStart(2, '0');
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const seconds = now.getSeconds().toString().padStart(2, '0');

                const datetime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                from.value = datetimeLocal(datetime);
            }

            function inputTo() {
                const to = document.getElementById('to');
                const now = new Date();
                now.setHours(now.getHours() + 1);
                const year = now.getFullYear();
                const month = (now.getMonth() + 1).toString().padStart(2, '0');
                const day = now.getDate().toString().padStart(2, '0');
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const seconds = now.getSeconds().toString().padStart(2, '0');

                const datetime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                to.value = datetimeLocal(datetime);
            }
        });
    </script>
    <!-- Request JS -->
    <script type="text/javascript">
        function getRecord() {
            let data;
            let device = $('#device').val();
            let period = $('#period').val();
            let from = $('#from').val();
            let to = $('#to').val();
            
            if (period != 'Custom') {
                data = {
                    device: device,
                    period: 'Today'
                }
            } else {
                data = {
                    device: device,
                    from: new Date(from).getTime(),
                    to: new Date(to).getTime(),
                }
            }

            $.ajax({
                url: "{{ route('replay.store') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: function(data) {
                    console.log(data)
                },
                error: function(data) {
                    console.log(data)
                }
            })
        }
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