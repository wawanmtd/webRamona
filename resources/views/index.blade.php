<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Radiation and Meterological Monitoring Analysis System</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/main.css">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap-theme.min.css">
    <script src="../bootstrap/dist/js/jquery-1.11.2.min.js"></script>
		<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
		<style type="text/css"></style>
	</head>
  </head>

  <body>
    <div class="page-header">
      <div class="container" style="float:inline-block">
        <img src="../resources/assets/img/MONLINK.png" width="7%" class="img-responsive"/>
        <h1>Radiation and Meterological Monitoring Analysis System</h1>
      </div>
    </div>

    <nav class="navbar navbar-default navbar-static-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapse" aria-expanded="false" aria-control="navbar" data-toggle="collapse" data-target="#navbar" name="button">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{action("HomeController@index")}}">RAMONA</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse" data-toggle="navbar">
          <ul class="nav nav-tabs">
            <li class="active"><a href="{{action("HomeController@index")}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <!-- <li class="<?php //if(function(@yield('title'))=="berita") {echo 'active';} ?>"><a href="berita"><span class="glyphicon glyphicon-bullhorn"></span> News</a></li> -->
            <li class=""><a href="berita"><span class="glyphicon glyphicon-bullhorn"></span> News</a></li>
            <li class=""><a href="about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>

            <button type="button" class="btn btn-default navbar-btn navbar-right" name="loginButton" action="#">Login</button>
          </ul>

        </div>
      </div>
    </nav>

    <div class="container" style="margin-bottom:15px">
        @yield('konten')
    </div>

    <footer class="footer">
      <div class="contrainer ">
        <a herf="http://www.batan.go.id">Badan Tenaga Nuklir Nasional</a> (c)2016
      </div>
    </footer>
  </body>
</html>
