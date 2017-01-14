@extends('layouts.master')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', " $titleTag ")


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted in: {{ $post->category->name }}</p>
        </div>
    </div><!-- end of header .row -->

    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} commentaires</h3>
            @foreach($post->comments as $comment)
            	<div class="comment">
            		<div class="author-info">
            			<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=identicon"}}" class="author-image">
            			<div class="author-name">
	            			<h3>{{ $comment->name }}</h3>
	            			<p class="author-time">{{ format_date($comment->created_at) }}</p>
            			</div> 
            			
            		</div>
            		<div class="comment-content">
            			{{ $comment->comment }}
            		</div>
            	</div>
            @endforeach
        </div>
    </div>

    <div class="row">
	    <div id="comment-form" class="col-md-8 col-md-offset-2 btn-h1-spacing">
	    	{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

	    		<div class="row">
		    		<div class="col-md-6 btn-h1-spacing">
		    			{{ Form::label('name', "Nom") }}
		    			{{ Form::text('name', null, ['class' => 'form-control']) }}
		    		</div>

		    		<div class="col-md-6 btn-h1-spacing">
		    			{{ Form::label('email', "Adresse email") }}
		    			{{ Form::text('email', null, ['class' => 'form-control']) }}
		    		</div>

		    		<div class="col-md-12 btn-h1-spacing">
		    			{{ Form::label('comment', "Commentaire") }}
		    			{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
		    		</div>

		    		<div class="col-md-12 btn-h1-spacing">
		    			{{ form::submit('Ajouter un commentaire', ['class' => 'form-control btn-success']) }}
		    		</div>
	    		</div>

	    	{{ Form::close() }}
	    </div>
    </div>
@endsection

