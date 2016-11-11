<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <title>@yield('title') - Radiation and Meterological Monitoring Analysis System</title> -->
<link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../bootstrap/main.css">
<link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap-theme.min.css">
<script src="../../bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../../bootstrap/dist/js/bootstrap.min.js"></script>
<style type="text/css"></style>


@extends('index')

@section ('title')
  {{$nameStation}} Status
@stop

@section ('konten')
  status
@stop
