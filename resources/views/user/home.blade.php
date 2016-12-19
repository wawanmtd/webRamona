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
    });
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

    // var infowindow = new google.maps.InfoWindow({
    //   content: ($('#currentCondition-contents').html()),
    //   maxWidth: 500
    var infowindow = new google.maps.InfoWindow({
      // content: ($('#currentCondition-contents').html()),
      maxWidth: 500

     });


    // var stationMarker =
    // [
    // {
    //   "lat" : -6.323651,
    //   "lng": 106.706313,
    //   "title" : "Batan"
    // },
    // {
    //   "lat" : -6.349738,
    //   "lng" : 106.664119,
    //   "title" : "Puspiptek"
    // }
    // ];


    // $.each(stationMarker, function (key, data)
    // {
    //   var latLng = new google.maps.LatLng(data.lat, data.lng);

    //   var marker = new google.maps.Marker({
    //     position: latLng,
    //     title : data.title,
    //     map : map
    //   });

    //////////////////////////////
     <?php foreach ($members as $member): ?>
       var latLng = new google.maps.LatLng({{$member->StationData->StationLat}},{{$member->StationData->StationLng}});

       var marker = new google.maps.Marker({
         position: latLng,
         title: "{{$member->StationData->StationName}}",
         map : map
      });
    
    ///////////////////////////////
      if ({{$gammaDoseRates}} > 1000 && {{$gammaDoseRates}} < 2000 ){
        marker.setIcon(radiationYellow);
      }
      else if ({{$gammaDoseRates}} > 2000) {
        marker.setIcon(radiationRed);
      }

      var infowindow = new google.maps.InfoWindow({
      maxWidth: 500});

    marker.addListener('click', function(){
      map.setZoom(16);
 
      //ajax untuk tampil last value
      $.ajax({
        url: 'stationlastvalue/{{$member->Member_ID}}',
        dataType: 'html',
        cache:false
      }).done(function(htmldata){
        // $('#currentCondition-contents').html(htmldata);
        infowindow.setContent(htmldata);
      }).fail(function(jqXHR,textStatus){
        alert('Request Failed : '+ textStatus);
      });
      infowindow.open(map, this);
      
    });
  // });
  <?php endforeach ?>
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeUKqLI5lfnjE4AgXMf3kv6Ye8CU7l-pU&callback=initMap" async defer></script>

<!-- <script type="text/html" id="currentCondition-contents">
   changed.asd
</script>-->

</html>

@stop
