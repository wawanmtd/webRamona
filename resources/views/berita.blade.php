@extends('index')

@section('title')
  News
@stop

@section('konten')
<link rel="stylesheet" href="../bootstrap/carousel.css">

<div id="newsCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#newsCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#newsCarousel" data-slide-to="1"></li>
    <li data-target="#newsCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Example headline.</h1>
          <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
        </div>
      </div>
    </div>

    <div class="item">
      <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
        </div>
      </div>
    </div>

    <div class="item">
      <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
        </div>
      </div>
    </div>
  </div>

  <a class="left carousel-control" href="#newsCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#newsCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container marketing">
  <div class="row">
    <div class="col-lg-4">
      <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" width="140" height="140" />
      <h2>Headline Berita</h2>
      <p>Cuplikan Berita</p>
      <p><a role="button" class="btn btn-default" href="#">view details &raquo</a></p>
    </div>

    <div class="col-lg-4">
      <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" width="140" height="140" />
      <h2>Headline Berita</h2>
      <p>Cuplikan Berita</p>
      <p><a role="button" class="btn btn-default" href="#">view details &raquo</a></p>
    </div>

    <div class="col-lg-4">
      <img class="img-circle" src="../resources/assets/img/svgPath/logoRamona.svg" alt="" width="140" height="140" />
      <h2><?php $Headline ="Headline-Berita"; echo $Headline; ?></h2>
      <p>Cuplikan Berita</p>
      <p><a role="button" class="btn btn-default" href="berita/<?php echo $Headline ?>">view details &raquo</a></p>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-offset-5">
    <nav aria-label="Page navigation">
      <ul class="pagination" >
        <li>
          <li>
            <a href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li>
            <a href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </li>
      </ul>
    </nav>

  </div>
</div>
@stop
