@extends('layouts.app')

@section('content-title', 'Home')
@section('content-subtitle', 'Dashboard')
<link rel="stylesheet" href="https://atlas.microsoft.com/sdk/css/atlas.min.css?api-version=1" type="text/css" />

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Dashboard</h3>
      </div>
      <div class="box-body">

        <div id="googleMap" style="width:100%;height:400px;"></div>

        <script>
        function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(-6.914744,	107.609810),
            zoom:10,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiXJUnB5HVCTFrkROCqd_3wmVnRrMyZD8&callback=myMap"></script>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="https://atlas.microsoft.com/sdk/js/atlas.min.js?api-version=1"></script>
<script src="https://atlas.microsoft.com/sdk/js/atlas-service.min.js?api-version=1"></script>

<style>
  html,
  body {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
  }

  #map {
    width: 100%;
    height: 100%;
  }
</style>
