@if (Session::has('Member_ID'))
	<!-- <strong>Well Done! </strong> {{Session::get('Member_ID')}} -->
@endif

@if (count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<strong>Error :</strong>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif


@if (!Session::has('Member_ID'))
	</div>
	<script type="text/javascript">
	    window.location.href = "../public"
	</script>
	<div class="alert alert-success" role="alert">
		<strong>Login terlebih dahulu</strong>

@endif