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
      #legend{
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
        width: 200px;
      }
    </style>
  </head>

  <body>
    <div id="map" style="width: 1150px; background-color:#EEEEEE; height: 600px; align:center "></div>
    <div id="legend"><h4>Gamma Dose Rates</h4></div>
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
    });
  }

  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: {lat: -6.3537604, lng: 106.6631774}
    });
    

    var svgPath = "../resources/assets/img/svgPath/";
    var icons = {
      radiationRed:{
        name: 'High Radiation',
        range: '>2000',
        icon: svgPath + 'radiationRed.svg'
      }, 
      radiationYellow:{
        name: 'Moderate Radiation',
        range: '1000 - 2000',
        icon: svgPath + "radiationYellow.svg"
      },
      radiationGreen:{
        name: 'Low Radiation',
        range: '<1000',
        icon: svgPath + "radiationGreen.svg"
      } 
    };

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 500
    });

     <?php foreach ($members as $member): ?>

       var latLng = new google.maps.LatLng({{$member->StationData->StationLat}},{{$member->StationData->StationLng}});

       var marker = new google.maps.Marker({
         position: latLng,
         title: "{{$member->StationData->StationName}}",
         map : map
      });

      // $.ajax({
      //   url: 'gamma/{{$member->Member_ID}}',
      //   dataType: 'json',
      //   cache: false
      // }).done(function(data){
      //   alert(data.SValue);
      // if (data.SValue < 1000) {
      //   marker.setIcon(icons.radiationGreen.icon);
      // }
      // else if (data.SValue > 2000) {
      //   marker.setIcon(icons.radiationRed.icon);
      // }
      // else{
      //   marker.setIcon(icons.radiationYellow.icon);
      // }
      // }).fail(function(jqXHR,textStatus){
      //   alert('Request Failed : '+ textStatus);
      // });



      if ({{$gammaDoseRates}} > 1000 && {{$gammaDoseRates}} < 2000 ){
        marker.setIcon(icons.radiationYellow.icon);
      }
      else if ({{$gammaDoseRates}} > 2000) {
        marker.setIcon(icons.radiationRed.icon);
      }
      else if ({{$gammaDoseRates}} < 1000) {
        marker.setIcon(icons.radiationGreen.icon);
      }
    
    marker.addListener('click', function(){
      map.setZoom(13);

      //ajax untuk tampil last value
      $.ajax({
        url: 'stationlastvalue/{{$member->Member_ID}}',
        dataType: 'html',
        cache:false
      }).done(function(htmldata){
        infowindow.setContent(htmldata);
      }).fail(function(jqXHR,textStatus){
        alert('Request Failed : '+ textStatus);
      });

      infowindow.open(map, this);

    });
  <?php endforeach ?>

  var legend = document.getElementById('legend');
  for (var key in icons){
    var type = icons[key];
    var name = type.name;
    var icon = type.icon;
    var range = type.range;
    var div = document.createElement('div');
    div.innerHTML = '<img src="' + icon + '" width="60px" /> <strong>'+ range +' &micro;Sv/h</strong>';
    legend.appendChild(div);
  }
  map.controls[google.maps.ControlPosition.LEFT_TOP].push(document.getElementById('legend'));
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeUKqLI5lfnjE4AgXMf3kv6Ye8CU7l-pU&callback=initMap" async defer></script>


@stop
