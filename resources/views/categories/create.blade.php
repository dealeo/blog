@extends('layouts.master')

@section('title', "Créer une nouvelle tâche")

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
        
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Créer une nouvelle tâche</h1>
            <hr>

            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}

	            <div class="form-group">
	            	{{ Form::label('title', 'Titre') }}
				    {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Veuillez saisir un titre', 'required' => '', 'maxlength' => '255', 'data-parsley-required-message' => 'Le titre est obligatoire')) }}
			    </div>

			    <div class="form-group">
	            	{{ Form::label('slug', 'Slug') }}
				    {{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'Veuillez saisir un slug', 'required' => '', 'minlength' => '5', 'maxlength' => '255', 'data-parsley-required-message' => 'Le titre est obligatoire')) }}
			    </div>

			    <div class="form-group">
	            	{{ Form::label('body', 'Contenu') }}
				    {{ Form::textarea('body', null, array('class' => 'form-control', 'rows' => '10', 'placeholder' => 'Tapez le contenu ici ...', 'required' => '', 'data-parsley-error-message' => 'Le contenu est obligatoire')) }}
			    </div>

			    {{ Form::submit('Créer une nouvelle tâche', array('class' => 'btn btn-success btn-lg btn-block')) }}

			{!! Form::close() !!}

        </div>
    </div><!-- end of header .row -->

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection