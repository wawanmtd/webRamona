@section('stylesheet')
<link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../bootstrap/main.css">
<link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../../amcharts/plugins/export/export.css">
<script src="../../bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../../bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../amcharts/amcharts.js"></script>
<script src="../../amcharts/serial.js"></script>
<script src="../../amcharts/plugins/export/export.min.js"></script>
<script src="../../amcharts/themes/light.js"></script>
<style type="text/css"></style>
<style>
.chartdiv {
	width	: 100%;
	height	: 170px;
}
</style>
@stop

@section('header')
  <img src="../../resources/assets/img/MONLINK.png" alt="" width="6%" class="img-responsive" style="float:left; margin:5px" />
@stop

@section('logoLogin')
  <img src="../../resources/assets/img/MONLINK.png" id="logoLogin" alt="" width="50%" />
@stop

@extends('user.index')

@section ('title')
  {{$nameStation}} Status
@stop

@section ('konten')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
				<div class="row">
					<div class="col-md-4">
						<div class="box-title">
							<h4>{{$nameStation}} - {{date("M, d")}}</h4>
						</div>
					</div>
					<div class="col-md-3" style="float:right">
						<div class="btn-group" role="group">
							<button onclick="#" type="button" name="todayStatus_btn" class="btn btn-default">Today</button>
							<button onclick="#" type="button" name="weeklyStatus_btn" class="btn btn-default">Weekly</button>
							<button onclick="#" type="button" name="monthlyStatus_btn" class="btn btn-default">Monthly</button>
						</div>

					</div>
				</div>
      </div>

      <div class="box-body">
        <div class="row">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/radiationYellow.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
											<h4>1000</h4>
											<!-- <h4 jput="gammadoserates"></h4> -->
	                  </div>
	                  <div class="col-md-1 col-md-offset-2">
	                    <h5><small>&micro;Sv/h</small></h5>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
					</a>
          <div class="col-md-10">
            <div id="gammaDoseChart" class="chartdiv"></div>
          </div>
        </div>

        <div class="row">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/termo.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>26</h4>
	                  </div>
	                  <div class="col-md-1 col-md-offset-2">
	                    <h5><small>&deg;C</small></h5>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
					</a>
          <div class="col-md-10">
            <div id="termoChart" class="chartdiv"></div>
          </div>
        </div>

        <div class="row">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/solarRadiation.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>94</h4>
	                  </div>
	                  <div class="col-md-1 col-md-offset-2">
	                    <h5><small>Wm&sup2;</small></h5>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
					</a>
          <div class="col-md-10">
            <div id="solarRadiationChart" class="chartdiv"></div>
          </div>
        </div>

        <div class="row">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/baroCloudChange.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>720</h4>
	                  </div>
	                  <div class="col-md-1 col-md-offset-2">
	                    <h5><small>mmHg</small></h5>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
					</a>
          <div class="col-md-10">
            <div id="barometerChart" class="chartdiv"></div>
          </div>
        </div>

        <div class="row">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/windNNE.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>25</h4>
	                  </div>
	                  <div class="col-md-1 col-md-offset-2">
	                    <h5><small>km/h</small></h5>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
					</a>
          <div class="col-md-10">
            <div id="windChart" class="chartdiv"></div>
          </div>
        </div>

        <div class="row">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/percipitation.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>0</h4>
	                  </div>
	                  <div class="col-md-1 col-md-offset-2">
	                    <h5><small>mm</small></h5>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
					</a>
          <div class="col-md-10">
            <div id="percipitationChart" class="chartdiv"></div>
          </div>
        </div>

        <div class="row">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/humidity.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>100</h4>
	                  </div>
	                  <div class="col-md-1 col-md-offset-2">
	                    <h5><small>%</small></h5>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
					</a>
          <div class="col-md-10">
            <div id="humidityChart" class="chartdiv"></div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<script>
var chartData = generateChartData();

var chart = AmCharts.makeChart("gammaDoseChart", {
    "type": "serial",
    "theme": "light",
    "marginRight": 80,
    "dataProvider": chartData,
    "valueAxes": [{
        "position": "left",
        "title": "Gamma Dose Rates"
    }],
    "graphs": [{
        "id": "g1",
        "fillAlphas": 0.4,
        "valueField": "visits",
         "balloonText": "<div style='margin:5px; font-size:19px;'>&micro;Sv/h:<b>[[value]]</b></div>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "scrollbarHeight": 20,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount": true,
        "color": "#AAAAAA"
    },
    "chartCursor": {
        "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
        "cursorPosition": "mouse"
    },
    "categoryField": "date",
    "categoryAxis": {
        "minPeriod": "mm",
        "parseDates": true
    },
    "export": {
        "enabled": true,
         "dateFormat": "YYYY-MM-DD HH:NN:SS"
    }
});

chart.addListener("dataUpdated", zoomChart);
// when we apply theme, the dataUpdated event is fired even before we add listener, so
// we need to call zoomChart here
zoomChart();
// this method is called when chart is first inited as we listen for "dataUpdated" event
function zoomChart() {
    // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
    chart.zoomToIndexes(chartData.length - 250, chartData.length - 100);
}

// generate some random data, quite different range
function generateChartData() {
    var chartData = [];
    // current date
    var firstDate = new Date();
    // now set 500 minutes back
    firstDate.setMinutes(firstDate.getDate() - 1000);

    // and generate 500 data items
    for (var i = 0; i < 500; i++) {
        var newDate = new Date(firstDate);
        // each time we add one minute
        newDate.setMinutes(newDate.getMinutes() + i);
        // some random number
        var visits = Math.round(Math.random() * 40 + 10 + i + Math.random() * i / 5);
        // add data item to the array
        chartData.push({
            date: newDate,
            visits: visits
        });
    }
    return chartData;
}
$(document).ready(function()
{
	var data = chartData;
	jPut.gammadoserates.data = data;

});
</script>
@stop
