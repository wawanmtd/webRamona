@extends('admin.index')

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


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
        <h3>5000 <sup style="font-size: 20px">&micro;Sv/h</sup></h3>
        <?php date_default_timezone_get("Asia/Jakarta"); ?>
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
        <h3>40 <sup style="font-size: 20px">&deg;C</sup></h3>

        <p>Muncul - {{date("M, d")}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-thermometer"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>24 <sup style="font-size: 20px">km/h</sup> NNE</h3>
        <p>Pamulang Barat - {{date("M, d")}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-compass"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>94 <sup style="font-size: 20px">Wm&sup2;</sup></h3>

        <p>Batan Serpong - {{date("M, d")}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-sunny"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>1000 <sup style="font-size: 20px">mmHg</sup></h3>
        <p>Pamulang Barat - {{date("M, d")}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-partlysunny-outline"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-orange">
      <div class="inner">
        <h3>0 <sup style="font-size: 20px">mm</sup></h3>
        <p>Batan Serpong - {{date("M, d")}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-rainy-outline"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>100 <sup style="font-size: 20px">%</sup></h3>
        <p>Ciputat Cipayung - {{date("M, d")}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-waterdrop"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<div class="row">
  <section class="col-lg-7 connectedSortable">
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

  </section>
  <section class="col-lg-5 connectedSortable">

    <!-- Calendar -->
    <div class="box box-solid bg-green-gradient">
      <div class="box-header">
        <i class="fa fa-calendar"></i>

        <h3 class="box-title">Calendar</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <!-- button with a dropdown -->
          <div class="btn-group">
            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bars"></i></button>
            <ul class="dropdown-menu pull-right" role="menu">
              <li><a href="#">Add new event</a></li>
              <li><a href="#">Clear events</a></li>
              <li class="divider"></li>
              <li><a href="#">View calendar</a></li>
            </ul>
          </div>
          <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-black">
        <div class="row">
          <div class="col-sm-6">
            <!-- Progress bars -->
            <div class="clearfix">
              <span class="pull-left">Task #1</span>
              <small class="pull-right">90%</small>
            </div>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
            </div>

            <div class="clearfix">
              <span class="pull-left">Task #2</span>
              <small class="pull-right">70%</small>
            </div>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <div class="clearfix">
              <span class="pull-left">Task #3</span>
              <small class="pull-right">60%</small>
            </div>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
            </div>

            <div class="clearfix">
              <span class="pull-left">Task #4</span>
              <small class="pull-right">40%</small>
            </div>
            <div class="progress xs">
              <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- right col -->
</div>
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
