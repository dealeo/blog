@extends('layouts.master')

@section('title', "Blog")


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div><!-- end of header .row -->

    @foreach ($posts as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $post->title}}</h2>
            <h5><b>Crée le {{ format_date($post->created_at) }} </b></h5>
            <p> {{ substr($post->body, 0, 250) }} {{ strlen($post->body) > 250 ? '...' : "" }}</p>
            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Voir plus</a>
        </div>
    </div>
    @endforeach
@endsection

