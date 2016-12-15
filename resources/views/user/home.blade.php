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
  </head>

  <body>
    <div id="map" style="width: 1150px; background-color:#EEEEEE; height: 600px; align:center "></div>
  </body>

  <script>

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

<<<<<<< HEAD
    marker.addListener('click', function(){
      map.setZoom(16);
      //infowindow.setContent('<div>'+marker.title+'</div>')
      infowindow.open(map, marker);
=======
      marker.addListener('click', function(){
        map.setZoom(16);
        // infowindow.setContent('<div>'+marker.title+'</div>');
        infowindow.open(map, this);
      });
>>>>>>> origin/master
    });

  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeUKqLI5lfnjE4AgXMf3kv6Ye8CU7l-pU&callback=initMap" async defer></script>

<script type="text/html" id="currentCondition-contents">

  <div class="row">
    <div class="col-md-6">
      <h4> {{$nameStation}} </h4>
    </div>
    <div class="col-md-3" style="float:right">
      <h4>{{date("M | d")}}</h4>
    </div>
  </div>

  <form action="" method="post">
  <div class="row" style="margin-bottom: 10px">
    <div class="items-collection">

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="termoDeg">
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
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="wind">
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
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="solarRad">
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
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-6 col-md-offset-3" style="margin-top:10px; margin-bottom: 10px">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="gammaDoseRates">
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
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="barometer">
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
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="percipitation">
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
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="humidity">
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
          </label>
        </div>
      </div>

    </div>
    <!-- items-collection -->
  </div>
  <!-- row -->
  <div class="row">
    <!-- <a href="stationStatus/{$map->dataProvider->images->id}" style="float:right" target="_blank">view details &raquo; </a> -->
    <div class="col-md-5">
      <h6><span class="glyphicon glyphicon-refresh"></span> Last Update: {{date("h:i a")}}</h6>
    </div>
    <div class="col-md-3 col-md-offset-3" style="float:right">
      <!-- <h6><a href="stationStatus/{$nameStation}"  target="_blank">view details &raquo; </a></h6> -->

      <button type="sumbit" name="submit"  />
    </div>
  </div>
</form>
<?php
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['var_id'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['var_id'] as $selected){
echo $selected."</br>";
}
}
}
?>

</script>


</html>

@stop
