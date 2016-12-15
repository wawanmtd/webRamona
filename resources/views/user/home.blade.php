@extends ('user.index')

@section ('title')
  Home
@stop

@section ('konten')
<html>
  <head>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>

    <link rel="stylesheet" href="../ammap/ammap.css" type="text/css">
    <script src="../ammap/ammap.js" type="text/javascript"></script>
    <script src="../ammap/maps/js/indonesiaLow.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../bootstrap/amchartstyle.css" type="text/css">

  </head>

  <body >
    <div id="map" style="width: 1150px; background-color:#EEEEEE; height: 600px; align:center "></div>
    <script>
// This example uses SVG path notation to add a vector-based symbol
// as the icon for a marker. The resulting icon is a star-shaped symbol
// with a pale yellow fill and a thick yellow border.

function CenterControl(controlDiv, map){
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor ='#fff';
  controlUI.style.cursor = 'pointer';
  controlUI.style.title = 'Click to re-center map';
  controlUI.style.textAlign = 'center';
  controlUI.style.border = '2px solid #fff';
  controlUI.style.borderRadius = '3px';
  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';

  // controlUI.style.
  controlDiv.appendChild(controlUI);

  var controlText = document.createElement('div');
  controlText.innerHTML = '<span class="fa fa-home"></span>';
  controlUI.appendChild(controlText);

  controlUI.addEventListener('click', function(){
    map.setZoom(13);
    map.setCenter({lat: -6.3537604, lng: 106.6631774});
  })
}

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: {lat: -6.3537604, lng: 106.6631774}
  });

  var buttonCenterDiv = document.createElement('div');
  var centerControl = new CenterControl(buttonCenterDiv, map);

  map.controls[google.maps.ControlPosition.TOP_CENTER].push(buttonCenterDiv);

  var radiationRed = "../resources/assets/img/svgPath/radiationRed.svg";
  var radiationYellow = "../resources/assets/img/svgPath/radiationYellow.svg";
  var radiationGreen = "../resources/assets/img/svgPath/radiationGreen.svg";

  var infowindow = new google.maps.InfoWindow({
    content: ($('#currentCondition-contents').html()),
    maxWidth: 500

  });

  var stationMarker =
    [
      {
        "lat" : -6.323651,
        "lng": 106.706313,
        "title" : "Batan"
      },
      {
        "lat" : -6.349738,
        "lng" : 106.664119,
        "title" : "Puspiptek"
      }
    ];

  $.each(stationMarker, function (key, data)
  {
    var latLng = new google.maps.LatLng(data.lat, data.lng);

    var marker = new google.maps.Marker({
      position: latLng,
      title : data.title,
      map : map
    });

    if ({{$gammaDoseRates}} > 1000 && {{$gammaDoseRates}} < 2000 ){
      marker.setIcon(radiationYellow);
    }
    else if ({{$gammaDoseRates}} > 2000) {
      marker.setIcon(radiationRed);
    }

    marker.addListener('click', function(){
      map.setZoom(16);
      //infowindow.setContent('<div>'+marker.title+'</div>')
      infowindow.open(map, marker);
    });
  });

}
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeUKqLI5lfnjE4AgXMf3kv6Ye8CU7l-pU&callback=initMap" async defer></script>

    <!-- <a tabindex="0" role="button" class="btn btn-success" data-toggle="popover" data-trigger="focus" data-placement="top">Click Popover</a> -->
  </body>


<script type="text/html" id="currentCondition-contents" class="popover hidden">

  <div class="row" style="backgroundFill:#000000">
    <div class="col-md-6  ">
      <h4> {{$nameStation}} </h4>
    </div>
    <div class="col-md-3" style="float:right">
      <h4>{{date("M | d")}}</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img src="../resources/assets/img/svgPath/termo.svg" alt="" />
            </div>
            <div class="col-md-2">
                <h4 class="text-center">{{$termoDeg}}</h4>
            </div>
            <div class="col-md-2 col-md-offset-1">
                <h5>&deg;C</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-6 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img src="../resources/assets/img/svgPath/windNNE.svg" alt="" />
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-3 col-md-offset-4">
                  <strong>{{$windDir}}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <strong>{{$windSpeed}}</strong>
                </div>
                <div class="col-md-2">
                  <strong>km/h<strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-6 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img src="../resources/assets/img/svgPath/solarRadiation.svg" alt="" />
            </div>
            <div class="col-md-2">
                <h4>{{$solarRad}}</h4>
            </div>
            <div class="col-md-2">
                <h5>Wm&sup2;</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6 col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img src="../resources/assets/img/svgPath/radiationYellow.svg" alt="" />
            </div>
            <div class="col-md-3">
                <h3>{{$gammaDoseRates}}</h3>
            </div>
            <div class="col-md-2 col-md-offset-1">
                <h5>&micro;Sv/h</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-6 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
                <img src="../resources/assets/img/svgPath/baroClearChange.svg" alt="" />
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6 col-md-offset-1">
                  {{$barometer}}
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  mmHg
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="col-xs-6 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img src="../resources/assets/img/svgPath/percipitation.svg" alt="" />
            </div>
            <div class="col-md-2 ">
                <h4>{{$percipitation}}</h4>
            </div>
            <div class="col-md-2 col-md-offset-1">
                <h5>mm</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-6 col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img src="../resources/assets/img/svgPath/humidity.svg" alt="" />
            </div>
            <div class="col-md-2">
                <h4>{{$humidity}}</h4>
            </div>
            <div class="col-md-2 col-md-offset-2">
                <h5>%</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <a href="stationStatus/{$map->dataProvider->images->id}" style="float:right" target="_blank">view details &raquo; </a> -->
  <a href="stationStatus/{{$nameStation}}" style="float:right" target="_blank">view details &raquo; </a>
</script>


</html>

@stop
