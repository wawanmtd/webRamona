<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="../ammap/ammap.css" type="text/css">
<script src="../ammap/ammap.js" type="text/javascript"></script>
<script src="../ammap/maps/js/indonesiaLow.js" type="text/javascript"></script>
@extends('admin.index')

@section('content-header')
  Dashboard
  <small>Main</small>
@stop

@section('konten')
<div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>5000 <small>&micro;Sv/h</small></h3>
            <?php
              date_default_timezone_get("Asia/Jakarta");
            ?>
            <p>Perumahan Puspiptek - {{date("M, d")}}</p>


          </div>
          <div class="icon">
            <!-- <i class="ion ion-alert-circled"></i> -->
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Visitors
              </h3>
            </div>
            <div class="box-body">
              <div id="mapdiv" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-1"></div>
                  <div class="knob-label">Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-2"></div>
                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <div id="sparkline-3"></div>
                  <div class="knob-label">Exists</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

<script>
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
</script>
@stop
