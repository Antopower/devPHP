@extends('layout')
@section('content')

	<div class="container">
		<section class="section-padding">
			<div class="jumbotron text-left">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1> Liste des Competitions </h1>
						<a href="{{ action('CompetitionsController@create') }}" class="btn btn-primary">Créer une compétition</a>						
					</div>
					
					@if ($resultatsCompetitions->isEmpty())
						<p>Aucune compétition de créé!</p>
					@else
					
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Participant #1</th>
									<th>Participant #2</th>
									<th>Resultat #1</th>
									<th>Resultat #2</th>
									<th>Gagnant</th>
									<th>Type</th>
									<th>Points</th>
									<th>Date et Heure</th>
									<th>Terrain</th>
									<th>Finaliste</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($resultatsCompetitions as $resultatsCompetition)
								
									<tr>
										<td><a href="{{ action('CompetitionsController@show', $resultatsCompetition->id) }}">{{ $resultatsCompetition->id }}</a> </td>
										<td>{{ Participant::findOrFail($resultatsCompetition->participant1_id)->prenom." ".Participant::findOrFail($resultatsCompetition->participant1_id)->nom }} </td>
										<td>{{ Participant::findOrFail($resultatsCompetition->participant2_id)->prenom." ".Participant::findOrFail($resultatsCompetition->participant2_id)->nom }} </td>
										<td>{{ $resultatsCompetition->resultat1 }} </td>
										<td>{{ $resultatsCompetition->resultat2 }} </td>
										<td>{{ Participant::findOrFail($resultatsCompetition->gagnant_id)->prenom." ".Participant::findOrFail($resultatsCompetition->gagnant_id)->nom }} </td>
										<td>{{ $resultatsCompetition->type }} </td>
										<td>{{ $resultatsCompetition->points }} </td>
										<td>{{ $resultatsCompetition->date_heure }} </td>
										<td>{{ $resultatsCompetition->terrain_id }} </td>
										<td>{{ $resultatsCompetition->finaliste }} </td>
										<td><a href="{{ action('CompetitionsController@edit',$resultatsCompetition->id) }}" class="btn btn-info">Éditer/Resultat</a></td>
										<td>
											{{ Form::open(array('action' => array('CompetitionsController@destroy',$resultatsCompetition->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) }}
	                                        	<button type="submit" href="{{ URL::route('competitions.destroy', $resultatsCompetition->id) }}" class="btn btn-danger btn-mini">Effacer</button>
	                                        {{ Form::close() }}   {{-- méthode pour faire le delete tel que décrit sur http://www.codeforest.net/laravel-4-tutorial-part-2 , 
	                                        						   un script js est appelé pour tous les form qui ont un "data-confirm" (voir assets/js/script.js) --}}
										</td>
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