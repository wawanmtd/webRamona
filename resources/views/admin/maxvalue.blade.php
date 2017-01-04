<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$gammaDoseRatesMax->SValue}} <sup style="font-size: 20px">&micro;Sv/h</sup></h3>
        <?php date_default_timezone_get("Asia/Jakarta"); ?>
        <p>{{$gammaDoseRatesMax->MemberData->StationData->StationName}}</p>
        <p>{{$gammaDoseRatesMax->Timestamp}}</p>
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