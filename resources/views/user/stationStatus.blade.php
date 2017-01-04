
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
  {{$stations->StationName}} Status
@stop

@section ('konten')


<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
				<div class="row">
					<div class="col-md-4">
						<div class="box-title">
							<h4>{{$stations->StationName}} - {{date("M, d")}}</h4>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-5" style="align:right" >
						<div class="btn-group">
							<button id="dropdownData_btn" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
								Show Data
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#table">Table</a></li>
								<li><a href="#chart">Chart</a></li>
							</ul>
						</div>
						<div class="btn-group">
							<button id="dropTime_btn" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Time Range
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Today</a></li>
								<li><a href="#">Weekly</a></li>
								<li><a href="#">Mothly</a></li>
							</ul>
						</div>
					</div>
      	</div>
			</div>

      @if($gammaDoseRates)
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
			        // "valueField": "visits",
			        "valueField": "SValue",
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
			    // "categoryField": "date",
			    "categoryField": "Timestamp",
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

			function generateChartData() {
			    var chartData = [];
			    <?php foreach ($gammaDoseRates as $gamma): ?>
			    	chartData.push({
			            Timestamp: "{{$gamma->Timestamp}}",
			            SValue: {{$gamma->SValue}}
			        });
			    <?php endforeach ?>
					// dd(chartData);
			    return chartData;
			}
	  </script>
      <div class="box-body">
        <div class="row" id="gammaDoseRow">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                  @if ($gammaDoseRatesLast->SValue > 2000)
	                  	<img src="../../resources/assets/img/svgPath/radiationGreen.svg" width="70px" alt="" />
	                  @elseif ($gammaDoseRatesLast->SValue < 1000)
	                  	<img src="../../resources/assets/img/svgPath/radiationGreen.svg" width="70px" alt="" />
	                  @else
	                    <img src="../../resources/assets/img/svgPath/radiationYellow.svg" width="70px" alt="" />
	                  @endif
	                  </div>
	                  <div class="col-md-2">
											<h4>{{$gammaDoseRatesLast->SValue}}</h4>
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
        @endif

        @if($termoDeg)
        <script>
			var chartData = generateChartData();
			var chart = AmCharts.makeChart("termoDegChart", {
			    "type": "serial",
			    "theme": "light",
			    "marginRight": 80,
			    "dataProvider": chartData,
			    "valueAxes": [{
			        "position": "left",
			        "title": "Termo Degree"
			    }],
			    "graphs": [{
			        "id": "g1",
			        "fillAlphas": 0.4,
			        // "valueField": "visits",
			        "valueField": "SValue",
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
			    // "categoryField": "date",
			    "categoryField": "Timestamp",
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

			function generateChartData() {
			    var chartData = [];
			    <?php foreach ($termoDeg as $termo): ?>
			    	chartData.push({
			            Timestamp: "{{$termo->Timestamp}}",
			            SValue: {{$termo->SValue}}
			        });
			    <?php endforeach ?>
					// dd(chartData);
			    return chartData;
			}
	  </script>
        <div class="row" id="termoDegRow" >
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/termo.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>{{$termoDegLast->SValue}}</h4>
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
            <div id="termoDegChart" class="chartdiv"></div>
          </div>
        </div>
        @endif

		@if($solarRad)
		<script>
			var chartData = generateChartData();
			var chart = AmCharts.makeChart("solarRadChart", {
			    "type": "serial",
			    "theme": "light",
			    "marginRight": 80,
			    "dataProvider": chartData,
			    "valueAxes": [{
			        "position": "left",
			        "title": "Solar Radiation"
			    }],
			    "graphs": [{
			        "id": "g1",
			        "fillAlphas": 0.4,
			        // "valueField": "visits",
			        "valueField": "SValue",
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
			    // "categoryField": "date",
			    "categoryField": "Timestamp",
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

			function generateChartData() {
			    var chartData = [];
			    <?php foreach ($solarRad as $solar): ?>
			    	chartData.push({
			            Timestamp: "{{$solar->Timestamp}}",
			            SValue: {{$solar->SValue}}
			        });
			    <?php endforeach ?>
					// dd(chartData);
			    return chartData;
			}
	  </script>
        <div class="row" id="solarRadRow">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            	<div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/solarRadiation.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>{{$solarRadLast->SValue}}</h4>
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
            <div id="solarRadChart" class="chartdiv"></div>
          </div>
        </div>
        @endif

		@if($barometer)
		<script>
			var chartData = generateChartData();
			var chart = AmCharts.makeChart("barometerChart", {
			    "type": "serial",
			    "theme": "light",
			    "marginRight": 80,
			    "dataProvider": chartData,
			    "valueAxes": [{
			        "position": "left",
			        "title": "Barometer"
			    }],
			    "graphs": [{
			        "id": "g1",
			        "fillAlphas": 0.4,
			        // "valueField": "visits",
			        "valueField": "SValue",
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
			    // "categoryField": "date",
			    "categoryField": "Timestamp",
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

			function generateChartData() {
			    var chartData = [];
			    <?php foreach ($barometer as $baro): ?>
			    	chartData.push({
			            Timestamp: "{{$baro->Timestamp}}",
			            SValue: {{$baro->SValue}}
			        });
			    <?php endforeach ?>
					// dd(chartData);
			    return chartData;
			}
	  </script>
        <div class="row" id="barometerRow">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/baroCloudChange.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>{{$barometerLast->SValue}}</h4>
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
        @endif

        @if($windDir)
        <script>
			var chartData = generateChartData();
			var chart = AmCharts.makeChart("windDirChart", {
			    "type": "serial",
			    "theme": "light",
			    "marginRight": 80,
			    "dataProvider": chartData,
			    "valueAxes": [{
			        "position": "left",
			        "title": "Wind Direction (in degree)"
			    }],
			    "graphs": [{
			        "id": "g1",
			        "fillAlphas": 0.4,
			        // "valueField": "visits",
			        "valueField": "SValue",
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
			    // "categoryField": "date",
			    "categoryField": "Timestamp",
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

			function generateChartData() {
			    var chartData = [];
			    <?php foreach ($windDir as $wdir): ?>
			    	chartData.push({
			            Timestamp: "{{$wdir->Timestamp}}",
			            SValue: {{$wdir->SValue}}
			        });
			    <?php endforeach ?>
					// dd(chartData);
			    return chartData;
			}
	  </script>
	  <!-- untuk windspeed -->
	  <script>
			var chartData = generateChartData();
			var chart = AmCharts.makeChart("windSpeedChart", {
			    "type": "serial",
			    "theme": "light",
			    "marginRight": 80,
			    "dataProvider": chartData,
			    "valueAxes": [{
			        "position": "left",
			        "title": "Wind Speed (km/h)"
			    }],
			    "graphs": [{
			        "id": "g1",
			        "fillAlphas": 0.4,
			        // "valueField": "visits",
			        "valueField": "SValue",
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
			    // "categoryField": "date",
			    "categoryField": "Timestamp",
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

			function generateChartData() {
			    var chartData = [];
			    <?php foreach ($windSpeed as $wspeed): ?>
			    	chartData.push({
			            Timestamp: "{{$wspeed->Timestamp}}",
			            SValue: {{$wspeed->SValue}}
			        });
			    <?php endforeach ?>
					// dd(chartData);
			    return chartData;
			}
	  </script>
        <div class="row" id="windRow">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/wind{{$windDirLast}}.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-6">
		                <div class="row">
		                  <div class="col-md-3 col-md-offset-2">
		                    <strong>{{$windDirLast}}</strong>
		                  </div>
		                </div>
		                <div class="row">
		                  <div class="col-md-2">
		                    <strong>{{$windSpeedLast->SValue}}</strong>
		                  </div>
		                  <div class="col-md-2 col-md-offset-2">
		                    <h5><small>km/h</small></h5>
		                  </div>
		                </div>
		              </div>
	                </div>
	              </div>
	            </div>
	          </div>
					</a>
          <div class="col-md-10">
            <div id="windDirChart" class="chartdiv"></div>
            <div id="windSpeedChart" class="chartdiv"></div>
          </div>
        </div>
        @endif

		@if($percipitation)
		<script>
			var chartData = generateChartData();
			var chart = AmCharts.makeChart("percipitationChart", {
			    "type": "serial",
			    "theme": "light",
			    "marginRight": 80,
			    "dataProvider": chartData,
			    "valueAxes": [{
			        "position": "left",
			        "title": "Percipitation"
			    }],
			    "graphs": [{
			        "id": "g1",
			        "fillAlphas": 0.4,
			        // "valueField": "visits",
			        "valueField": "SValue",
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
			    // "categoryField": "date",
			    "categoryField": "Timestamp",
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

			function generateChartData() {
			    var chartData = [];
			    <?php foreach ($percipitation as $perci): ?>
			    	chartData.push({
			            Timestamp: "{{$perci->Timestamp}}",
			            SValue: {{$perci->SValue}}
			        });
			    <?php endforeach ?>
					// dd(chartData);
			    return chartData;
			}
	  </script>
        <div class="row" id="percipitationRow">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/percipitation.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>{{$percipitationLast->SValue}}</h4>
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
        @endif

		@if($humidity)
		<script>
			var chartData = generateChartData();
			var chart = AmCharts.makeChart("humidityChart", {
			    "type": "serial",
			    "theme": "light",
			    "marginRight": 80,
			    "dataProvider": chartData,
			    "valueAxes": [{
			        "position": "left",
			        "title": "Humidity"
			    }],
			    "graphs": [{
			        "id": "g1",
			        "fillAlphas": 0.4,
			        // "valueField": "visits",
			        "valueField": "SValue",
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
			    // "categoryField": "date",
			    "categoryField": "Timestamp",
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

			function generateChartData() {
			    var chartData = [];
			    <?php foreach ($humidity as $humi): ?>
			    	chartData.push({
			            Timestamp: "{{$humi->Timestamp}}",
			            SValue: {{$humi->SValue}}
			        });
			    <?php endforeach ?>
					// dd(chartData);
			    return chartData;
			}
	  </script>
        <div class="row" id="humidityRow">
					<a href="#">
	          <div class="col-md-2 col-xs-6">
	            <div class="panel panel-default">
	              <div class="panel-body">
	                <div class="row">
	                  <div class="col-md-4">
	                    <img src="../../resources/assets/img/svgPath/humidity.svg" width="70px" alt="" />
	                  </div>
	                  <div class="col-md-2">
	                    <h4>{{$humidityLast->SValue}}</h4>
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
        @endif

      </div>

		</div>
  </div>
</div>

<script>
//changed
</script>
@stop
