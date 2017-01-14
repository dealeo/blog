@extends('layouts.master')

@section('title', "Editer un commentaire")


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
	    <h1>Editer un commentaire</h1>

	    {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => "PUT"]) }}

	    	{{ Form::label('name', 'Nom') }}
	    	{{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}

	    	{{ Form::label('email', 'Adresse email') }}
	    	{{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}

	    	{{ Form::label('comment', 'Commentaire') }}
	    	{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

	    	{{ Form::submit('Mettre à jour', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;' ])}}

	    {{ Form::close() }}
   </div>
</div>

@endsection

