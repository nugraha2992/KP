@extends('layouts.app')

@section('content-title', 'Home')
@section('content-subtitle', 'Dashboard')

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
         function initMap() {
          var locations = [
                          ['Unit Buahbatu - Bandung',	-6.945301,	107.63069],
                            ['Unit Cicaheum Bdg',	-6.902432,	107.659335],
                            ['Unit Cihampelas',	-6.906082,	107.604075],
                            ['Unit Cijerah - Bandung',	-6.929029,	107.565662],
                            ['Unit Ciroyom',	-6.916251,	107.589291],
                            ['Unit Ciwastra',	-6.955649,	107.653053],
                            ['Unit Dalem Kaum - Syariah',	-6.922563,	107.607678],
                            ['Unit Dayeuhkolot - Bandung',	-7.009377,	107.611654],
                            ['Unit Gegerkalong',	-6.869166,	107.588296],
                            ['Unit Kopo',	0,	0,]
                            ['Unit Leuwi Panjang Bdg',	-6.938509,	107.596955]
                        ];

            var map = new google.maps.Map(document.getElementById('googleMap'), {
                  zoom: 11,
                  center: new google.maps.LatLng(-6.945301, 107.63069),
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                });
              var infowindow = new google.maps.InfoWindow();

                  var marker, i;

                  for (i = 0; i < locations.length; i++) {  
                    marker = new google.maps.Marker({
                      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                      map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                      return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                      }
                    })(marker, i));
                  }
          }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiXJUnB5HVCTFrkROCqd_3wmVnRrMyZD8&callback=initMap"></script>
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
