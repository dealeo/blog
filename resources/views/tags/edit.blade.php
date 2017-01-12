@extends('layouts.master')

@section('title', "Modifier un tag")

@section('content')

    <div class="row">

        <div class="col-md-12">

        <h1>Modifier un tag</h1>
        <hr>
        </div>

        <div class="col-md-6 col-md-offset-3">
	    	<div class="well">
	    		{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}

	    		<div class="form-group">
		    		{{ Form::label('Name', 'Nom') }}
		    		{{ Form::text('name', null, ['class' => 'form-control']) }}
	    		</div>
	    		<div class="form-group">
		    		{{ Form::submit('Modifier le tag', ['class' => 'btn btn-success btn-block'])}}
	    		</div>
	    		{{ Form::close() }}
	    	</div>
	    </div>
    </div>

@endsection