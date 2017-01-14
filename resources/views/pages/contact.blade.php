@extends('layouts.master')

@section('title', "Contactez-nous")

@section('content')
        
    <div class="row">
        <div class="col-md-12">
            <h1>Contactez-nous</h1>
            <hr>
            {{ Form::open( ['method' => 'POST', 'url' => ['contact']]) }}
                <div class="form-group">
                    {{ Form::label('email', 'Adresse email') }}
                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Veuillez saisir votre adresse email', 'required' => '', 'maxlength' => '255')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('subject', 'Sujet') }}
                    {{ Form::text('subject', null, array('class' => 'form-control', 'placeholder' => 'Veuillez saisir un sujet', 'maxlength' => '255')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('message', 'Message') }}
                    {{ Form::textarea('message', null, array('class' => 'form-control', 'placeholder' => 'Veuillez saisir un message')) }}
                </div>

                <button type="submit" class="btn btn-success">Envoyer un message</button>
                
            {{ Form::close() }}
        </div>
    </div><!-- end of header .row -->

@endsection