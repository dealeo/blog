@extends('layouts.master')

@section('title', "Supprimer un commentaire")


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
	    <h1>Supprimer un commentaire ?</h1>
	    <p>
	    	<strong>Nom : </strong>{{ $comment->name }}<br>
	    	<strong>Adresse email : </strong>{{ $comment->email }}<br>
	    	<strong>Commentaire : </strong>{{ $comment->comment }}<br>
	    </p>


	    {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => "DELETE"]) }}

	    	{{ Form::submit('SUPPRIMER LE COMMENTAIRE', ['class' => 'btn btn-lg btn-block btn-danger'])}}

	    {{ Form::close() }}
   </div>
</div>

@endsection

