@extends('layout')
@section('content')

<section class="header section-padding">
	<div class="container">
		<div class="header-text">
			<h1>Création</h1>
			<p>Page de création d'une compétition</p>
		</div>
	</div>
</section>

<div class="container">
	<section class="section-padding">
		<div class="jumbotron text-left">
			<h1>Veuillez choisir un sport</h1>
			{{ Form::open(['action'=> 'CompetitionsController@index', 'class' => 'form', 'id' => 'formName']) }}
			<div style="Display:inline-block;" id="liste-sports">
				<?php $sportsListe = [];
					foreach($sports as $sport) {
					$sportsListe[$sport->id] = $sport->nom;
				}?>
				{{ Form::select('sportsListe', $sportsListe, array_values($sportsListe)[0], array('id' => 'sportsListe')) }}
				<h1>Veuillez choisir une épreuve</h1>
				<div id="liste-epreuves">
					
				</div>
				<div id="liste-participant">
				</div>

			</div> <!-- liste-sports -->
			<div class="form-group">
				{{ Form::submit('Créer', ['class' => 'btn btn-primary'])}}
				<a href="{{ action('CompetitionsController@index') }}" class="btn btn-warning">Annuler</a>
			</div>
			{{ Form::close() }}
		</div>
	</section>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#formName').submit(function() {
    	var e = document.getElementById("participantsListe");
    	var strUser = e.options[e.selectedIndex].text;

    	var e2 = document.getElementById("participantsListe2");
    	var strUser2 = e2.options[e2.selectedIndex].text;

        if (strUser == strUser2) {
            alert('Les deux participants doivent être différents');
            return false; // The form will *not* submit
        }
    });
});
</script>

<script>

	function afficheListeEpreuves() {
		$.ajax({
			type: 'POST',
			url: '{{URL::action('EpreuvesController@epreuvesPourSportDropdown') }}',
			data: { sportId : document.getElementById('sportsListe').value },
			timeout: 1000,
			success: function(data){
				document.getElementById('liste-epreuves').innerHTML=data;
				}
		});
	}

	function afficheListeParticipant() {
		$.ajax({
			type: 'POST',
			url: '{{URL::action('ParticipantsController@participantsDropdown') }}',
			data: { sportId : document.getElementById('sportsListe').value },
			timeout: 1000,
			success: function(data){
				document.getElementById('liste-participant').innerHTML=data;
				}
		});
	}

	$(document).ready(function() {
		afficheListeEpreuves();
		afficheListeParticipant();
	});


	$("#sportsListe").change(function(e) {
		afficheListeEpreuves();
		afficheListeParticipant();

	});
</script>

@stop
