@extends('layouts.master')

@section('title', "Contactez-nous")



@section('content')
        
    <div class="row">
        <div class="col-md-12">
            <h1>Contactez-nous</h1>
            <hr>
            <form>
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="text" class="form-control" id="email" placeholder="Veuillez saisir votre adresse email">
                </div>

                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input type="text" class="form-control" id="subject" placeholder="Sujet">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" rows="5" id="message" placeholder="Tapez votre message ici ..."></textarea>
                </div>

                <button type="submit" class="btn btn-success">Envoyer un message</button>
                
            </form>
        </div>
    </div><!-- end of header .row -->

@endsection