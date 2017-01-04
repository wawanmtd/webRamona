@extends('admin.index')
@section('script-dashboard')
  <link rel="stylesheet" href="../ammap/ammap.css" type="text/css">
  <link rel="stylesheet" href="../bootstrap/adminlte/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../bootstrap/adminlte/plugins/daterangepicker/daterangepicker.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../bootstrap/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../bootstrap/adminlte/plugins/daterangepicker/daterangepicker.js"></script>

<script src="../bootstrap/adminlte/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../bootstrap/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../bootstrap/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="../bootstrap/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../bootstrap/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../bootstrap/adminlte/plugins/knob/jquery.knob.js"></script>

<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- stop yang ini gua apus..  -->
  <script src="../bootstrap/adminlte/js/pages/dashboard.js"></script>
    <script src="../ammap/ammap.js" type="text/javascript"></script>
    <script src="../ammap/maps/js/indonesiaLow.js" type="text/javascript"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="../bootstrap/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="../bootstrap/adminlte/plugins/daterangepicker/daterangepicker.js"></script>

  <script src="../bootstrap/adminlte/plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="../bootstrap/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../bootstrap/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

  <script src="../bootstrap/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../bootstrap/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../bootstrap/adminlte/plugins/knob/jquery.knob.js"></script>

  <script>
  $.widget.bridge('uibutton', $.ui.button);
  </script>
@stop

@section('content-header')
  Dashboard
  <small>Main</small>
@stop

@section('konten')
<div id="maxvalue">
  <!-- somecontent -->
</div>
@if(Session::get('AccessLevel') == 1)
  <script>
    $.ajax({
      url : 'getmaxvalue',
      dataType : 'html',
      cache : false
    }).done(function(htmlcontent){
      $('#maxvalue').html(htmlcontent);
    }).fail(function(jqXHR, textStatus){
      alert('Request Failed : ' + textStatus);
    });
  </script>
@endif
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
            <!-- <div id="mapdiv" style="height: 250px; width: 100%;"></div> -->
            <div id="world-map" style="height: 250px; width: 100%;"></div>
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
