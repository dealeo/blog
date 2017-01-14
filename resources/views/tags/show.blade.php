@extends('layouts.master')

@section('title', "Liste des tâches associées au tag")


@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} <small> {{ $tag->posts()->count() }} tâches</small></h1>
            <hr>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block btn-h1-spacing">Editer</a>
        </div>
        <div class="col-md-2">
        {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
            {{ Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block btn-h1-spacing']) }}
        {{ Form::close() }}
        </div>

    </div><!-- end of header .row -->

    <div class="row">
        <div class="col-md-12">
	        <div class="table-responsive">
	            <table class="table">
					<thead>
						<tr>
							<th>Titre</th>
							<th>Tags</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($tag->posts as $post)
							<tr>
								<td>{{ $post->title }}</td>
								<td>
								@foreach ($post->tags as $tag)
									<span class="label label-default">{{ $tag->name }}</span>
								@endforeach
								</td>
								<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">Voir la tâche</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
        </div>
    </div>

@endsection

