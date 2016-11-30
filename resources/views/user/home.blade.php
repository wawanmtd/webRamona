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
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <script>
      var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";
      // var targetSVG = "../resources/assets/img/svgPath/radiatonYellwow.svg";
      var map = AmCharts.makeChart( "mapdiv", {
                "type": "map",
                "theme": "light",
                "projection": "miller",

                "imagesSettings": {
                  "rollOverColor": "#089282",
                  "rollOverScale": 3,
                  "selectedScale": 3,
                  "selectedColor": "#089282",
                  "color": "#13564e",
                },

                "areasSettings": {
                  "unlistedAreasColor": "#15A892"
                },

                "dataProvider": {
                  "map": "indonesiaLow",
                  "images": [{
                    // "imageURL" : "../resources/assets/img/svgPath/radiationYellow.svg",
                    "id" : 1,
                    "zoomLevel": 10,
                    "scale": 0.5,
                    "title": "PRFN Batan",
                    "latitude": -6.3507952,
                    "longitude": 106.6608021,
                    "autoZoom" : true,
                    "url" : "#"
                  },
                  {
                    // "imageURL" : "../resources/assets/img/svgPath/radiationRed.svg",
                    "id" : 2,
                    "zoomLevel": 10,
                    "scale": 0.5,
                    "title": "Komplek Puspiptek",
                    "latitude": -6.353642,
                    "longitude": 106.676552
                  }],
                  getAreasFromMap:true
                },

                "export": {
                  "enabled": true
                },
              });

        // add events to recalculate map position when the map is moved or zoomed
        map.addListener( "positionChanged", updateCustomMarkers );

        // this function will take current images on the map and create HTML elements for them
        function updateCustomMarkers( event ) {
          // get map object
          var map = event.chart;

          // go through all of the images
          for ( var x in map.dataProvider.images ) {
            // get MapImage object
            var image = map.dataProvider.images[ x ];

            // check if it has corresponding HTML element
            if ( 'undefined' == typeof image.externalElement )
              image.externalElement = createCustomMarker( image );

            // reposition the element accoridng to coordinates
            var xy = map.coordinatesToStageXY( image.longitude, image.latitude );
            image.externalElement.style.top = xy.y + 'px';
            image.externalElement.style.left = xy.x + 'px';
          }
        }

        // this function creates and returns a new marker element
        function createCustomMarker( image ) {
          // create holder
          var holder = document.createElement( 'div' );
          holder.className = 'map-marker map-clickable';
          // holder.title = image.title;
          holder.style.position = 'absolute';
          holder.role = 'button';
          // maybe add a link to it?
          if ( undefined != image.url ) {
            holder.onclick = function() {
              window.location.href = image.url;

            };
            holder.className += ' map-clickable';
          }

          // create dot
          var dot = document.createElement( 'div' );
          dot.className = 'dot';
          holder.appendChild( dot );

          // create pulse
          var pulse = document.createElement( 'div' );
          pulse.className = 'pulse';
          holder.appendChild( pulse );

          // append the marker to the map container
          image.chart.chartDiv.appendChild( holder );
          // $(holder).popover('show');
          $(holder).popover(
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
          }).click(function(e) {
              $(this).popover('toggle');
              // $('.close').remove();
              // $('.popover-title').append('<a type="button" class="close" style="float:right">&times;</a>');
              $('.close').click(function(e){
                  $(this).parents('.popover').remove();
              });
            });
          return holder;
        }
      </script>
  </head>

  <body >
    <div id="mapdiv" style="width: 1150px; background-color:#EEEEEE; height: 600px; align:center "></div>
    <!-- <a tabindex="0" role="button" class="btn btn-success" data-toggle="popover" data-trigger="focus" data-placement="top">Click Popover</a> -->
  </body>

  <div id="currentCondition-title" class="popover hidden">
    <div class="row">
      <div class="col-md-2 col-md-offset-1">
        {{$nameStation}}
      </div>
      <div class="col-md-3 col-md-offset-2" style="float:right" >
        {{date("M | d ")}}
        <a role="button" type="button" class="close">&times;</a>

      </div>
      <div class="col-md-1 col-md-offset-3" style="float:right" >
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
  </div>

</html>

@stop
