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
    <div id="mapdiv" style="width: 1150px; background-color:#EEEEEE; height: 600px; align:center "></div>
    <button type="button" class="btn btn-success" data-toggle="popover" data-placement="top">Click Popover</button>
  </body>

  <div id="currentCondition-title" class="popover hidden">
    <div class="row">
      <div class="col-md-5">
        <h5>{nameStation}</h5>
      </div>
      <div class="col-md-3 col-md-offset-3" style="float:right" >
        <?php
          date_default_timezone_set("Asia/Jakarta");
          echo "<h5>".date("m | d")."</h5>";
        ?>
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
                  <h4 class="text-center">100</h4>
              </div>
              <div class="col-md-2 col-md-offset-1">
                  <h5>&degC</h5>
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
                    NNE
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    25
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
                  <h4>94</h4>
              </div>
              <div class="col-md-2">
                  <h5>Wm&sup2</h5>
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
                  <h3>1000</h3>
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
                    1000
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
                  <h4>0</h4>
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
                  <h4>50</h4>
              </div>
              <div class="col-md-2 col-md-offset-2">
                  <h5>%</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a href="#" style="float:right">view details>>> </a>
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
