@section('stylesheet')
<link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../bootstrap/main.css">
<link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap-theme.min.css">
<script src="../../bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../../bootstrap/dist/js/bootstrap.min.js"></script>
<style type="text/css"></style>
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
        <div class="box-title">
          <h4>{{$nameStation}}</h4>
        </div>
      </div>

      <div class="box-body">
        <div class="row">
          <div class="col-md-2 col-xs-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-4">
                    <img src="../../resources/assets/img/svgPath/radiationYellow.svg" alt="" />
                  </div>
                  <div class="col-md-2">
                    <h4>1000</h4>
                  </div>
                  <div class="col-md-1 col-md-offset-1">
                    <h5><small>&deg;C</small></h5>
                  </div>
                </div>
              </div>
              <div class="col-md-10">

              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

@stop
