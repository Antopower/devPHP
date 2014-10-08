@extends('layout')
@section('content')
	
	<div class="container">
		<section class="section-padding">
			<div class="jumbotron text-left">
				<div class="panel panel-default">
					<div class="panel-heading">
					@if(Confide::user() == "")
						<h1>Veuillez-vous connecter! Merci!</h1>
					@else
						<h1> Bienvenue dans le système de gestion des résultats des jeux du Québec</h1>
						<a href="{{ action('SportsController@index') }}" class="btn btn-primary">Gestion des Sports</a>	
						<a href="{{ action('EpreuvesController@index') }}" class="btn btn-primary">Gestion des Épreuves</a>
						<a href="{{ action('ParticipantsController@index') }}" class="btn btn-primary">Gestion des Participants</a>
						<a href="{{ action('CompetitionsController@index') }}" class="btn btn-primary">Gestion des Compétitions</a>		
					@endif				
											
					</div>
					
					
				</div>
			</div>
		</section>
	</div>
	
@stop