@extends('layout')
@section('content')

	<div class="container">
		<section class="section-padding">
			<div class="jumbotron text-left">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1> Liste des Sports </h1>
						<a href="{{ action('SportsController@create') }}" class="btn btn-primary">Créer un sport</a>						
					</div>
					
					@if ($sports->isEmpty())
						<p>Aucun sport de créé!</p>
					@else
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom</th>
									<th>Saison</th>
									<th>Description</th>
									<th>Url logo</th>
									<th>Url page officielle</th>
									<th>Tournoi</th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($sports as $sport)
									<tr>
										<td><a href="{{ action('SportsController@show', $sport->id) }}">{{ $sport->id }}</a> </td>
										<td>{{ $sport->nom }} </td>
										<td>{{ $sport->saison }} </td>
										<td>{{ $sport->description_courte }} </td>
										<td>{{ $sport->url_logo }} </td>
										<td>{{ $sport->url_page_officielle }} </td>
										<td>{{ $sport->tournoi }} </td>
										<td><a href="{{ action('SportsController@edit',$sport->id) }}" class="btn btn-info">Éditer</a></td>
										<td>
											{{ Form::open(array('action' => array('SportsController@destroy',$sport->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) }}
	                                        	<button type="submit" href="{{ URL::route('sports.destroy', $sport->id) }}" class="btn btn-danger btn-mini">Effacer</button>
	                                        {{ Form::close() }}   {{-- méthode pour faire le delete tel que décrit sur http://www.codeforest.net/laravel-4-tutorial-part-2 , 
	                                        						   un script js est appelé pour tous les form qui ont un "data-confirm" (voir assets/js/script.js) --}}
										</td>
										<td><a href="{{ action('EpreuvesController@index',array('sportId'=>$sport->id)) }}" class="btn btn-info">Épreuves</a></td>
										
										
									</tr>
								@endforeach
							</tbody>
								
						</table>
					@endif
				</div>
			</div>
		</section>
	</div>

@stop