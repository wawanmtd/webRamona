@extends ('user.index')

@section('title')
  About
@stop

@section ('konten')
<div class="row">
  <div class="col-md-6">
  <h3>Contact</h3>
  <br>
  <p>
    email : <a href="mailto:example@batan.go.id?subject=feedback">example@batan.go.id</a>
  </p>
  <p>
    address : Komplek Puspiptek Gedung 71 lt2 Badan Tenaga Nuklir Nasional
  </p>
  <br>
  
  <h4>Quick Message</h4>
  <form action="#" method="post">
    <div class="form-group">
      <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="your email address" required>
    </div>
    <div class="form-group">
      <textarea name="userMessage" class="form-control"  rows="4" cols="40" placeholder="type your message here" required></textarea>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>

  </div>
  <div class="col-md-6">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.342193439857!2d106.66195131432161!3d-6.3497216638881975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e459e35f3c65%3A0xb64e978685e0995f!2sPRFN+BATAN!5e0!3m2!1sen!2sid!4v1481038292073" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</div>
@stop
