@if (Session::has('Success'))
	<div class="alert alert-success" role="alert">
		<strong>Well Done! </strong> {{Session::get('Success')}}
	</div>
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