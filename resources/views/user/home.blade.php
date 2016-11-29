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

      <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" href="../ammap/ammap.css" type="text/css">
      <script src="../ammap/ammap.js" type="text/javascript"></script>
      <script src="../ammap/maps/js/indonesiaLow.js" type="text/javascript"></script>
      <script>
        var map;

        AmCharts.ready(function() {
          map = new AmCharts.AmMap();

          map.balloon.color = "#000000";

          var dataProvider = {
            mapVar: AmCharts.maps.indonesiaLow,
            getAreasFromMap:true

          };

          map.dataProvider = dataProvider;

          map.areasSettings = {
            autoZoom: true,
            selectedColor: "#CC0000"
          };

          map.smallMap = new AmCharts.SmallMap();

          map.write("mapdiv");
        });
      </script> -->
      <script>
      function initMap() {
          var myLatLng = {lat: -25.363, lng: 131.044};

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: myLatLng
          });

          var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
          });
        }

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeUKqLI5lfnjE4AgXMf3kv6Ye8CU7l-pU&signed_in=true&callback=initMap"></script>

  </head>

  <body>
    <!-- <div id="mapdiv" style="width: 1150px; background-color:#EEEEEE; height: 600px; align:center "></div> -->
    <div id="map"></div>

    <a tabindex="0" role="button" class="btn btn-success" data-toggle="popover" data-trigger="focus" data-placement="top">Click Popover</a>
  </body>

  <div id="currentCondition-title" class="popover hidden">
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        <h5>{{$nameStation}}</h5>
      </div>
      <div class="col-md-3 col-md-offset-3" style="float:right" >
        <h5>{{date("m | d")}}</h5>
      </div>
    </div>
  </div>

  <div id="currentCondition-content" class="popover hidden">
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
                    {{$windDir}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    {{$windSpeed}}
                  </div>
                  <div class="col-md-2">
                    km/h
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
                  <h5>&microSv/h</h5>
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

    <a href="stationStatus/{{$nameStation}}" style="float:right" target="_new">view details &raquo </a>
  </div>
</html>

<script>
  $(function () {
    $('[data-toggle=popover]').popover(
      {
        title: function()
        {
          return $("#currentCondition-title").html();
        },
        content: function()
        {
          return $("#currentCondition-content").html();
        },
        placement: "top",
        html: true,
        container: "body"
      });
    });
  </script>
@stop
