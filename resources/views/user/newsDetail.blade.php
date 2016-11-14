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

@section('title')
  {{$headline}}
@stop

@section('konten')

  <h2><?php echo $headline; ?></h2>
@stop
