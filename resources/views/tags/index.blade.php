@extends('layouts.master')

@section('title', "Liste des tags")

@section('content')

    <div class="row">

        <div class="col-md-8">

        <h1>Liste des tags</h1>

	        <div class="table-responsive">
	            <table class="table">
					<thead>
						<tr>
							<th>Nom</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($tags as $tag)
							<tr>
							<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
        </div>

        <div class="col-md-4">
	    	<div class="well">
	    		{{ Form::open(['route' => 'tags.store', 'method' => 'POST']) }}
	    		<h2> Nouveau tag</h2>
	    		<div class="form-group">
		    		{{ Form::label('Name', 'Nom') }}
		    		{{ Form::text('name', null, ['class' => 'form-control']) }}
	    		</div>
	    		<div class="form-group">
		    		{{ Form::submit('Créer un nouveau tag', ['class' => 'btn btn-primary btn-block'])}}
	    		</div>
	    		{{ Form::close() }}
	    	</div>
	    </div>
    </div>

@endsection