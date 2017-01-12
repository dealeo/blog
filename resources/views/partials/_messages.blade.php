@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Bien joué!</strong> {{ Session::get('success') }}
	</div>
@endif

@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<strong>Erreur!</strong>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif