<div class="row">
    <div class="col-md-6">
      <h4> {{$StationData->StationName}} </h4>
    </div>
    <div class="col-md-3" style="float:right">
      <h4>{{date("M | d")}}</h4>
    </div>
  </div>

  <form action="" method="post">
  <div class="row" style="margin-bottom: 10px">
    <div class="items-collection">

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="termoDeg">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/termo.svg" alt="" />
              </div>
              <div class="col-md-2">
                  <h4 class="text-center">{{$termoDeg}}</h4>
              </div>
              <div class="col-md-2 col-md-offset-1">
                  <h5>&deg;C</h5>
              </div>
            </div>
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="wind">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/windNNE.svg" alt="" />
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3 col-md-offset-4">
                    <strong>{{$windDir}}</strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <strong>{{$windSpeed}}</strong>
                  </div>
                  <div class="col-md-2">
                    <strong>km/h<strong>
                  </div>
                </div>
              </div>
            </div>
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="solarRad">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/solarRadiation.svg" alt="" />
              </div>
              <div class="col-md-2">
                  <h4>{{$solarRad}}</h4>
              </div>
              <div class="col-md-2">
                  <h5>Wm&sup2;</h5>
              </div>
            </div>
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-6 col-md-offset-3" style="margin-top:10px; margin-bottom: 10px">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="gammaDoseRates">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/radiationYellow.svg" alt="" />
              </div>
              <div class="col-md-3">
                  <h3>{{$gammaDoseRates->SValue}}</h3>
              </div>
              <div class="col-md-2 col-md-offset-1">
                  <h5>&micro;Sv/h</h5>
              </div>
            </div>
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="barometer">
            <div class="row">
              <div class="col-md-6">
                  <img src="../resources/assets/img/svgPath/baroClearChange.svg" alt="" />
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6 col-md-offset-1">
                    {{$barometer}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    mmHg
                  </div>
                </div>
              </div>
            </div>
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="percipitation">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/percipitation.svg" alt="" />
              </div>
              <div class="col-md-2 ">
                  <h4>{{$percipitation}}</h4>
              </div>
              <div class="col-md-2 col-md-offset-1">
                  <h5>mm</h5>
              </div>
            </div>
          </label>
        </div>
      </div>

      <div class="items col-xs-6 col-md-4">
        <div data-toggle="buttons" class="btn-group">
          <label class="btn btn-default">
            <input type="checkbox" name="var_id[]" autocomplete="off" value="humidity">
            <div class="row">
              <div class="col-md-4">
                  <img src="../resources/assets/img/svgPath/humidity.svg" alt="" />
              </div>
              <div class="col-md-2">
                  <h4>{{$humidity}}</h4>
              </div>
              <div class="col-md-2 col-md-offset-2">
                  <h5>%</h5>
              </div>
            </div>
          </label>
        </div>
      </div>

    </div>
    <!-- items-collection -->
  </div>
  <!-- row -->
  <div class="row">
    <!-- <a href="stationStatus/{$map->dataProvider->images->id}" style="float:right" target="_blank">view details &raquo; </a> -->
    <div class="col-md-5">
      <h6><span class="glyphicon glyphicon-refresh"></span> Last Update: {{date("h:i a")}}</h6>
    </div>
    <div class="col-md-3 col-md-offset-3" style="float:right">
      <!-- <h6><a href="stationStatus/{$nameStation}"  target="_blank">view details &raquo; </a></h6> -->

      <button type="sumbit" name="submit"  />
    </div>
  </div>
</form>
<?php
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['var_id'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['var_id'] as $selected){
echo $selected."</br>";
}
}
}
?>