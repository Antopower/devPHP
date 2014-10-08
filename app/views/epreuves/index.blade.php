<!-- epreuves -->
@extends('layout')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<div class="container">
		<section class="section-padding">
			<div class="jumbotron text-left">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1> Liste des épreuves</span></h1>
						{{ Form::open(['action'=> ['EpreuvesController@create'], 'class' => 'form', 'method' => 'get']) }}
							{{ Form::hidden('sportId', '1', array('id'=>'sportId')) }}
							{{ Form::submit('Créer une épreuve', ['class' => 'btn btn-primary'])}}
						{{ Form::close() }}
						
					</div>
					<div id="liste-sports">
						<?php $sportsListe = [];
						foreach($sports as $sport) {
							$sportsListe[$sport->id] = $sport->nom;
						}?>
						{{ Form::select('sportsListe', $sportsListe, $sportId, array('id' => 'sportsListe')) }}
					</div> <!-- liste-sports -->
					
					<div id="liste-epreuves">
					<?php // cette div sera remplie par le code js ?>
						
					</div> <!-- liste-epreuves -->
					
				</div>
			</div>
		</section>
	</div>

<script>

	function afficheListeEpreuves() {
		$.ajax({
			type: 'POST',
			url: '{{URL::action('EpreuvesController@epreuvesPourSport') }}',
			data: { sportId : document.getElementById('sportsListe').value },
			timeout: 1000,
			success: function(data){
				document.getElementById('liste-epreuves').innerHTML=data;
				}
		});		
	}	

	function updateCreateButton() {
		document.getElementById('sportId').value=document.getElementById('sportsListe').value;
	}		
		
	$(document).ready(function() {
		afficheListeEpreuves();
		updateCreateButton();
	});

	
	$("#sportsListe").change(function(e) {
		afficheListeEpreuves();
		updateCreateButton();
		
	});
</script>

@stop