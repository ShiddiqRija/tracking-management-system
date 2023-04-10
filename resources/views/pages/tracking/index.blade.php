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
                    <label class="visually-hidden" for="search-devices">Device</label>
                    <input type="text" class="form-control" id="search-devices" placeholder="Search Device">
                </div>
            </div>
        </div>

        <div class="list-group" id="device-list" style="max-height: 78vh; overflow-y: auto;">
            <!-- <button class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <div>
                        <h5 class="mb-1">Device Name</h5>
                        <p class="mb-1"><i class="mdi mdi-account-heart"></i> : 70 <i class="mdi mdi-temperature-celsius"></i> : 36.2</p>
                    </div>
                    <span class="my-auto">
                        <small><i class="mdi mdi-battery"></i>45%</small>
                    </span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <div>
                        <h5 class="mb-1">Device Name 1</h5>
                        <p class="mb-1"><i class="mdi mdi-account-heart"></i> : 71 <i class="mdi mdi-temperature-celsius"></i> : 36.2</p>
                    </div>
                    <span class="my-auto">
                        <small><i class="mdi mdi-battery"></i>80%</small>
                    </span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <div>
                        <h5 class="mb-1">Device Name 2</h5>
                        <p class="mb-1"><i class="mdi mdi-account-heart"></i> : 72 <i class="mdi mdi-temperature-celsius"></i> : 36.2</p>
                    </div>
                    <span class="my-auto">
                        <small><i class="mdi mdi-battery"></i>22%</small>
                    </span>
                </div>
            </button> -->
        </div>
    </div>
</div>

@endsection

@push('css')
<!-- Action Notif -->
<link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    .page-content {
        padding: calc(70px + 24px) calc(24px / 2) 0px calc(24px / 2);
    }
</style>
@endpush

@push('script')
<!-- Action Notif -->
<script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/notif.js') }}"></script>
<!-- google maps api -->
<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyB5OXoMmPKwLbrSWAF8D2cp_yP0lDS8oPo"></script> -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCMuyTDQ4zd__ZPPja86kIefxTcK2fiqVE"></script>
<!-- Gmaps file -->
<script src="{{ asset('assets/libs/gmaps/gmaps.min.js') }}"></script>
<script src="{{ asset('assets/libs/gmaps/markerCluster.js') }}"></script>
<!-- GMaps init -->
<script type="text/javascript">
    $(document).ready(function() {
        var map;
        var markers = [];

        markerInit();

        setInterval(() => {
            markerUpdate();
        }, 5000);

        map = new GMaps({
            div: '#map',
            lat: 1.1134006,
            lng: 104.0652815,
            zoom: 11,
            disableDefaultUI: true,
            markerClusterer: function(map) {
                return new MarkerClusterer(map, [], {
                    styles: [{
                        url: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m1.png',
                        height: 53,
                        width: 53,
                        textColor: '#ffffff',
                        textSize: 14,
                        backgroundPosition: '0 0'
                    }, {
                        url: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m2.png',
                        height: 56,
                        width: 56,
                        textColor: '#ffffff',
                        textSize: 14,
                        backgroundPosition: '-48px 0'
                    }, {
                        url: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m3.png',
                        height: 66,
                        width: 66,
                        textColor: '#ffffff',
                        textSize: 14,
                        backgroundPosition: '-96px 0'
                    }],
                    maxZoom: 13
                });
            }
        });

        function markerInit() {
            $.ajax({
                url: "{{ route('deviceInfo') }}",
                type: "GET",
                success: function(data) {
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(null)
                    }

                    for (let i = 0; i < data.length; i++) {
                        let location = data[i].location
                        markers.push(map.addMarker({
                            lat: location.latitude,
                            lng: location.longitude,
                            title: data[i].name
                        }))
                    }
                }
            });
        }

        function markerUpdate() {
            $.ajax({
                url: "{{ route('deviceInfo') }}",
                type: "GET",
                success: function(data) {
                    for (let i = 0; i < data.length; i++) {
                        markers[i].setPosition({
                            lat: parseFloat(data[i].location.latitude),
                            lng: parseFloat(data[i].location.longitude),
                        });
                    }
                }
            });
        }

        //update center to the device
        $(document).on('click', '.device-item-list', function(e) {
            e.preventDefault();

            var lat, lng;

            var $index = $(this).data('marker-index');
            var $lat = $(this).data('marker-lat');
            var $lng = $(this).data('marker-lng');

            if ($index != undefined) {
                // using indices
                var position = map.markers[$index].getPosition();
                lat = position.lat();
                lng = position.lng();
            } else {
                // using coordinates
                lat = $lat;
                lng = $lng;
            }

            map.setCenter(lat, lng);
        });

    });
</script>
<!-- Device init -->
<script type="text/javascript">
    $(document).ready(function() {
        getDevice();

        setInterval(() => {
            getDevice();
        }, 5000);


        function getDevice() {
            $.ajax({
                url: "{{ route('deviceInfo') }}",
                type: "GET",
                success: function(data) {
                    var deviceList = $("#device-list");
                    deviceList.empty();
                    $.each(data, function(index, device) {
                        let attributes = JSON.parse(device.location.attributes)
                        var button = $("<button>")
                            .addClass("list-group-item list-group-item-action device-item-list")
                            .attr("data-marker-index", `${index}`)
                            .attr("aria-current", "true")
                            .html('<div class="d-flex w-100 justify-content-between"><div><h5 class="mb-1">' + device.name + '</h5><p class="mb-1"><i class="mdi mdi-account-heart"></i> : ' + attributes.heartRate + ' <i class="mdi mdi-temperature-celsius"></i> : ' + attributes.weatherTemp + '</p></div><span class="my-auto"><small><i class="mdi mdi-battery"></i>' + attributes.batteryLevel + '%</small></span></div>');
                        deviceList.append(button);
                    });
                }
            });
        }

        function filterButtons(searchValue) {
            var buttons = $("#device-list button");
            buttons.each(function() {
                var buttonName = $(this).find("h5").text().toLowerCase();
                if (buttonName.includes(searchValue)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $("#search-devices").on("input", function() {
            var searchValue = $(this).val().toLowerCase();
            filterButtons(searchValue);
        });

    });
</script>
@endpush