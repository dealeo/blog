@extends('layouts.master')

@section('title', "Liste des catégories")

@section('content')

    <div class="row">

        <div class="col-md-8">

        <h1>Liste des catégories</h1>

	        <div class="table-responsive">
	            <table class="table">
					<thead>
						<tr>
							<th>Nom</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($categories as $category)
							<tr>
								<td>{{ $category->name }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
        </div>

        <div class="col-md-4">
	    	<div class="well">
	    		{{ Form::open(['route' => 'categories.store', 'method' => 'POST']) }}
	    		<h2> Nouvelle catégorie</h2>
	    		<div class="form-group">
		    		{{ Form::label('Name', 'Nom') }}
		    		{{ Form::text('name', null, ['class' => 'form-control']) }}
	    		</div>
	    		<div class="form-group">
		    		{{ Form::submit('Créer une catégorie', ['class' => 'btn btn-primary btn-block'])}}
	    		</div>
	    		{{ Form::close() }}
	    	</div>
	    </div>
    </div>

@endsection