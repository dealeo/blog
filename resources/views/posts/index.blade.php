@extends('layouts.master')

@section('title', "Liste des tâches")

@section('content')
        
    <div class="row">
        <div class="col-md-8">
            <h1>Liste des tâches</h1>
        </div>

        <div class="col-md-4">
        	<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-success btn-h1-spacing">Créer une nouvelle tâche</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div><!-- end of header .row -->

    <div class="row">
        <div class="col-md-12">
	        <div class="table-responsive">
	            <table class="table">
					<thead>
						<th>Titre</th>
						<th>Contenu</th>
						<th>Crée le</th>
						<th></th>
					</thead>

					<tbody>
						@foreach ($posts as $post)
							<tr>
								<th>{{ $post->title }}</th>
								<td>{{ substr($post->body, 0, 50) }} {{ strlen($post->body) > 50 ? "..." : "" }}</td>
								<td>{{ format_date($post->created_at) }}</td>
								<td>
									<div class="col-md-6">
										<a href="{{ Route('posts.show', $post->id) }}" class="btn btn-primary btn-sm btn-block">Voir</a>
									</div>
									<div class="col-md-6">
										<a href="{{ Route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm btn-block">Editer</a>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="text-center">
				{{ $posts->links() }}
			</div>
        </div>
    </div>

@endsection
