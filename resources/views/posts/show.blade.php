@extends('layouts.master')

@section('title', "Vue de la tâche")


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Fiche de la tâche</h1>
            <hr>
        </div>
    </div><!-- end of header .row -->

    <div class="row">
        <div class="col-md-8">
            <h3>{{ $post->title }}</h3>
            <hr>
            <p>{{ $post->body }}</p>
            <hr>
            <div class="tags">
            	@foreach ($post->tags as $tag)
            		<span class="label label-default">{{ $tag->name }}</span>
            	@endforeach
            </div>
        </div>

        <div class="col-md-4">
        	<div class="well">
	        	<dl class="dl-horizontal">
	        		<label>Url:</label>
	        		<p><a href="{{ url('blog/' .$post->slug) }}">{{url('blog/' .$post->slug)}}</a></p>
	        	</dl>

	        	<dl class="dl-horizontal">
	        		<label>Catégorie:</label>
	        		<p>{{ $post->category->name }}</p>
	        	</dl>

	        	<dl class="dl-horizontal">
	        		<label>Crée le:</label>
	        		<p>{{ format_date($post->created_at) }}</p>
	        	</dl>

	        	<dl class="dl-horizontal">
	        		<label>Mis à jour le:</label>
	        		<p>{{ format_date($post->updated_at) }}</p>
	        	</dl>
	        	<hr>
	        	<div class="row">
	        		<div class="col-sm-6">
	        			<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Editer</a>
	        		</div>
	        		<div class="col-sm-6">
	        			{{ Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) }}

	        			{{ Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block']) }}

	        			{{ Form::close() }}
	        		</div>
	        	</div>
	        	<hr>
	        	<div class="row">
	        		<div class="col-md-12">
	        			<a href="{{ route('posts.index') }}" class="btn btn-default btn-block"><< Voir toutes les tâches</a>
	        		</div>
	        	</div>
        	</div>
        </div>
    </div><!-- end of header .row -->

@endsection

