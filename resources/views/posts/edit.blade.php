@extends('layouts.master')

@section('title', "Editer la tâche")

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Editer la tâche</h1>
            <hr>
        </div>
    </div><!-- end of header .row -->

    <div class="row">

    	{{ Form::model($post, ['method' => 'PUT', 'route' => ['posts.update', $post->id], 'data-parsley-validate' => '']) }}

        <div class="col-md-8">
            <div class="form-group">
            	{{ Form::label('title', 'Titre') }}
			    {{ Form::text('title', null, array('class' => 'form-control input', 'placeholder' => 'Veuillez saisir un titre', 'required' => '', 'maxlength' => '255', 'data-parsley-required-message' => 'Le titre est obligatoire')) }}
		    </div>

		    <div class="form-group">
            	{{ Form::label('slug', 'Slug') }}
			    {{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'Veuillez saisir un slug', 'required' => '', 'minlength' => '5', 'maxlength' => '255', 'data-parsley-required-message' => 'Le titre est obligatoire')) }}
		    </div>

		    <div class="form-group">
            	{{ Form::label('category_id', 'Categorie') }}
            	{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
		    </div>

		    <div class="form-group">
	            {{ Form::label('tags', 'Tag') }}
	            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			</div>

		    <div class="form-group">
		    	{{ Form::label('body', 'Contenu') }}
			    {{ Form::textarea('body', null, array('class' => 'form-control', 'rows' => '10', 'placeholder' => 'Tapez le contenu ici ...', 'required' => '', 'data-parsley-error-message' => 'Le contenu est obligatoire')) }}
		    </div>
        </div>

        <div class="col-md-4">
        	<div class="well">
	        	<dl class="dl-horizontal">
	        		<dt>Crée le:</dt>
	        		<dd>{{ format_date($post->created_at) }}</dd>
	        	</dl>

	        	<dl class="dl-horizontal">
	        		<dt>Mis à jour le:</dt>
	        		<dd>{{ format_date($post->updated_at) }}</dd>
	        	</dl>
	        	<hr>
	        	<div class="row">
	        		<div class="col-sm-6">
	        			<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Annuler</a>
	        		</div>
	        		<div class="col-sm-6">
	        			{{ Form::submit('Enregistrer', ['class' => 'btn btn-success btn-block']) }}
	        		</div>
	        	</div>
        	</div>
        </div>

        {{ Form::close() }}

    </div><!-- end of .row (form) -->

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$(".select2-multi").select2();
		$(".select2-multi").select2().val({{ $post->tags()->getRelatedIds() }}).trigger('change');
	</script>
@endsection