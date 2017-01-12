@extends('layouts.master')

@section('title', "Page d'accueil")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-3">Bienvenue sur 2 Do List !</h1>
                <p class="lead">Vous retrouverez ici toutes les tâches à effectuer et l'historique des tâches déjà réalisées.</p>
                <hr class="m-y-md">
                <p>A vous de jouer.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Commencez</a>
                </p>
            </div>
        </div>
    </div><!-- end of header .row -->

    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)

                <div class="post">
                    <h3>{{ $post->title  }}</h3>
                    <p>{{ $post->body  }}</p>
                    <a href="{{ url('blog/' . $post->slug) }}" class="btn btn-primary">Voir la tâche</a>
                </div>

                <hr>

            @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div><!-- end of header .row -->

@endsection