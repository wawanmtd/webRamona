<div class="row">
    <div class="col-md-6">
      <h4> {{$StationData->StationName}} </h4>
    </div>
    <div class="col-md-3" style="float:right">
      <h4>{{date("M | d")}}</h4>
    </div>
  </div>

  <form action="stationStatus/{{$StationData->Member_ID}}" method="post">
  <div class="row" style="margin-bottom: 10px">
    <div class="items-collection">

      <div class="items col-xs-6 col-md-6 col-md-offset-3" style="margin-top:10px; margin-bottom: 10px">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="sensor[]" autocomplete="off" value="1">
            <div class="row">
              <div class="col-md-4">
                @if($gammaDoseRates->SValue <= 1000)
                  <img src="../resources/assets/img/svgPath/radiationGreen.svg" alt="" />
                @elseif ($gammaDoseRates->SValue > 1000 && $gammaDoseRates->SValue <= 2000 )
                  <img src="../resources/assets/img/svgPath/radiationYellow.svg" alt="" />
                @elseif ($gammaDoseRates->SValue > 2000)
                  <img src="../resources/assets/img/svgPath/radiationRed.svg" alt="" />
                @endif
              </div>
              <div class="col-md-3">
                  <h3>{{$gammaDoseRates->SValue}} <small>&micro;Sv/h</small></h3>
              </div>
            </div>
          </label>
        </div>
      </div>


      @if ($termoDeg)
      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="sensor[]" autocomplete="off" value="6">
            <div class="row">
              <div class="col-md-3">
                  <img src="../resources/assets/img/svgPath/termo.svg" alt="" />
              </div>
              <div class="col-md-2">
                  <h4 class="text-center">{{$termoDeg->SValue}} <small>&deg;C</small> </h4>
              </div>
            </div>
          </label>
        </div>
      </div>
      @endif

      @if($windDir)
      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="sensor[]" autocomplete="off" value="2">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/wind{{$windDir}}.svg" alt="" />
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3 col-md-offset-4">
                    <strong>{{$windDir}}</strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <strong>{{$windSpeed->SValue}} km/h</strong>
                  </div>
                </div>
              </div>
            </div>
          </label>
        </div>
      </div>
      @endif

      @if($solarRad)
      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="sensor[]" autocomplete="off" value="4">
            <div class="row">
              <div class="col-md-3">
                  <img src="../resources/assets/img/svgPath/solarRadiation.svg" alt="" />
              </div>
              <div class="col-md-2">
                  <h4>{{$solarRad->SValue}} <small>Wm&sup2;</small></h4>
              </div>
            </div>
          </label>
        </div>
      </div>
      @endif

      @if($barometer)
      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="sensor[]" autocomplete="off" value="5">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/baroClearChange.svg" alt="" />
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                   <strong>{{$barometer->SValue}} </strong></br>mmHg
                  </div>
                </div>
              </div>
            </div>
          </label>
        </div>
      </div>
      @endif

      @if($percipitation)
      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="sensor[]" autocomplete="off" value="7">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/percipitation.svg" alt="" />
              </div>
              <div class="col-md-2 ">
                  <h4>{{$percipitation->SValue}} <small>mm</small></h4>
              </div>
            </div>
          </label>
        </div>
      </div>
      @endif

      @if($humidity)
      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="sensor[]" autocomplete="off" value="8">
            <div class="row">
              <div class="col-md-3">
                  <img src="../resources/assets/img/svgPath/humidity.svg" alt="" />
              </div>
              <div class="col-md-2">
                  <h4>{{$humidity->SValue}} <small>%</small> </h4>
              </div>
            </div>
          </label>
        </div>
      </div>
      @endif

    </div>
    <!-- items-collection -->
  </div>
  <!-- row -->
  <div class="row">
    <div class="col-md-5">
      <!-- <h6><span class="glyphicon glyphicon-refresh"></span> Last Update: {{date("h:i a")}}</h6> -->
      <h6><span class="glyphicon glyphicon-refresh"></span> Last Update: {{$gammaDoseRates->Timestamp}}</h6>
    </div>
    <div class="col-md-3 col-md-offset-3" style="float:right">
      <button class="btn btn-info btn-xs" type="sumbit">view details &raquo;</button>
    </div>
  </div>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="_method" value="POST">
  <input type="hidden" name="sensorr[]" id="sensor_array">
</form>
