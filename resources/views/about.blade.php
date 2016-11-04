@extends ('index')

@section('title')
  About
@stop

@section ('konten')
  <h3>Contact</h3>
  <br>
  <p>
    email : <a href="mailto:joe@example.com?subject=feedback">example@batan.go.id</a>
  </p>
  <p>
    address : Komplek Puspiptek Gedung 71 lt2 Badan Tenaga Nuklir Nasional
  </p>
  <br>
  <h4>Quick Message</h4>
  <form action="" method="post">
    <div class="form-group">
      <input type="email" class="form-control" style="width:30%" name="userEmail" id="userEmail" placeholder="your email address">
    </div>
    <div class="form-group">
      <textarea name="userMessage" class="form-control" style="width:30%" rows="4" cols="40" placeholder="type your message here"></textarea>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
@stop
