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

  <body>
    <div class="header">
      <div class="container" >
        <!-- <img id="logoHeader" /> -->
        <img src="../resources/assets/img/MONLINK.png" width="6%" class="img-responsive" style="float:left; margin:5px" />
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
            <li id="newsTab" class=""><a href="berita"><span class="glyphicon glyphicon-bullhorn"></span> News</a></li>

            <li class=""><a href="about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>

            <button type="button" class="btn btn-default navbar-btn navbar-right" name="loginButton" action="#"
                    data-toggle="modal" data-target="#loginModal">Login</button>
          </ul>

        </div>
      </div>
    </nav>

    <div class="container" style="margin-bottom:15px">
        @yield('konten')
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Login</h4>
          </div>

          <div class="modal-body ">
            <div class="row">
              <div class="col-md-6 col-xs-offset-4">
                <img src="../resources/assets/img/MONLINK.png" id="logoLogin" alt="" width="50%" />
              </div>
            </div>
            <h4 class="form-signin-heading" >Radiation and Meterological Monitoring Analysis System</h4>
              <br>
              <form>
                <div class="form-group">
                  <label for="inputUsername" class="sr-only">Username</label>
                  <input type="username" id="inputUsername" class="form-control" placeholder="Username"  required autofocus>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password"  required>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </div>
              </form>
          </div>
        </div>

      </div>
    </div>
    <footer class="footer">
      <div class="container ">
        <a href="http://www.batan.go.id" target="_blank">Badan Tenaga Nuklir Nasional</a> &copy2016
      </div>
    </footer>
  </body>
</html>

<script>
  $('#loginModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
  })
</script>
