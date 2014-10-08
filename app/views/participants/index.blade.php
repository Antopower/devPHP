@extends('layout')
@section('content')

	<div class="container">
		<section class="section-padding">
			<div class="jumbotron text-left">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1> Liste des Participants </h1>
						<a href="{{ action('ParticipantsController@create') }}" class="btn btn-primary">Créer un participant</a>						
					</div>
					
					@if ($participants->isEmpty())
						<p style="text-align:center">Aucun participant de créé!</p>
					@else
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom</th>
									<th>Prenom</th>
									<th>Numéro</th>
									<th>Région</th>
									<th>Or</th>
									<th>Argent</th>
									<th>Bronze</th>
									<th>Points</th>
									<th>Équipe</th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($participants as $participant)
									<tr>
										<td><a href="{{ action('ParticipantsController@show')}}">{{ $participant->id }}</a> </td>
										<td>{{ $participant->nom }} </td>
										<td>{{ $participant->prenom }} </td>
										<td>{{ $participant->numero }} </td>
										<td>{{ $participant->region_id }} </td>
										<td>{{ $participant->or }} </td>
										<td>{{ $participant->argent }} </td>
										<td>{{ $participant->bronze }} </td>
										<td>{{ $participant->points }} </td>
										<td>{{ $participant->equipe }} </td>
										<td><a href="{{ action('ParticipantsController@edit',$participant->id) }}" class="btn btn-info">Éditer</a></td>
										<td>
											 {{ Form::open(array('action' => array('ParticipantsController@destroy',$participant->id), 'method' => 'delete', 'data-confirm' => 'Êtes-vous certain?')) }}
	                                        	<button type="submit" href="{{ URL::route('participants.destroy', $participant->id) }}" class="btn btn-danger btn-mini">Effacer</button>
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