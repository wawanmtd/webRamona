
        <?php date_default_timezone_get("Asia/Jakarta"); ?>

<div class="row">
  @if($gammaDoseRatesMax)
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$gammaDoseRatesMax->SValue}} <sup style="font-size: 20px">&micro;Sv/h</sup></h3>
        <p>{{$gammaDoseRatesMax->MemberData->StationData->StationName}}</p>
        <p>{{$gammaDoseRatesMax->Timestamp}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-alert-circled"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif
  <!-- ./col -->
  @if($termoDegMax)
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$termoDegMax->SValue}} <sup style="font-size: 20px">&deg;C</sup></h3>
        <p>{{$termoDegMax->MemberData->StationData->StationName}}</p>
        <p>{{$termoDegMax->Timestamp}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-thermometer"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif
  <!-- ./col -->
  @if($windSpeedMax)
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$windSpeedMax->SValue}} <sup style="font-size: 20px">km/h</sup> NNE</h3>
        <p>{{$windSpeedMax->MemberData->StationData->StationName}}</p>
        <p>{{$windSpeedMax->Timestamp}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-compass"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif
  <!-- ./col -->
  @if($solarRadMax)
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$solarRadMax->SValue}} <sup style="font-size: 20px">Wm&sup2;</sup></h3>

        <p>{{$solarRadMax->MemberData->StationData->StationName}}</p>
        <p>{{$solarRadMax->Timestamp}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-sunny"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif
  <!-- ./col -->

</div>
<div class="row">
  @if($barometerMax)
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>{{$barometerMax->SValue}} <sup style="font-size: 20px">mm</sup></h3>
        <p>{{$barometerMax->MemberData->StationData->StationName}}</p>
        <p>{{$barometerMax->Timestamp}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-partlysunny-outline"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif

  @if($percipitationMax)
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-orange">
      <div class="inner">
        <h3>{{$percipitationMax->SValue}} <sup style="font-size: 20px">mmHg</sup></h3>
        <p>{{$percipitationMax->MemberData->StationData->StationName}}</p>
        <p>{{$percipitationMax->Timestamp}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-rainy-outline"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif

  @if($humidityMax)
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>{{$humidityMax->SValue}} <sup style="font-size: 20px">%</sup></h3>
        <p>{{$humidityMax->MemberData->StationData->StationName}}</p>
        <p>{{$humidityMax->Timestamp}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-waterdrop"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif
</div>