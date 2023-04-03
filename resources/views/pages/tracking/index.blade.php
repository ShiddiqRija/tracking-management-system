@extends('layout/auth', ['page' => 'tracking'])

@section('content')
<div class="row">
    <div class="col-xl-9">
        <div id="map" style="height: 88vh;"></div>
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
<script src="https://maps.google.com/maps/api/js?key=AIzaSyB5OXoMmPKwLbrSWAF8D2cp_yP0lDS8oPo"></script>
<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyCMuyTDQ4zd__ZPPja86kIefxTcK2fiqVE"></script> -->
<!-- Gmaps file -->
<script src="{{ asset('assets/libs/gmaps/gmaps.min.js') }}"></script>
<!-- GMaps init -->
<script type="text/javascript">
    map = new GMaps({
        div: '#map',
        lat: 1.1134006,
        lng: 104.0652815,
        zoom: 11,
        disableDefaultUI: true
    });
</script>
@endpush