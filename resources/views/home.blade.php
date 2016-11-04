@extends ('index')

@section ('title')
  Home
@stop

@section ('konten')
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

      <link rel="stylesheet" href="../ammap/ammap.css" type="text/css">
      <script src="../ammap/ammap.js" type="text/javascript"></script>
      <!-- check ammap/maps/js/ folder to see all available countries -->
      <!-- map file should be included after ammap.js -->
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
      </script>
  </head>

  <body>
    <div id="mapdiv" style="width: 1150px; background-color:#EEEEEE; height: 600px; align:center ">

    </div>
    <button type="button" class="btn btn-success" data-toggle="popover" title="BATAN"
            data-content="Data batan" data-placement="top" data-container="body">Click Popover</button>
  </body>
</html>

<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })

</script>
@stop
