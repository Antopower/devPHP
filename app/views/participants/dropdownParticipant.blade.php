
	@if ($participants == NULL)
		<p>Aucun participant inscrit dans ce sport!</p>
	@else
		@if($sport->tournoi == "1")
			<?php $participantsListe = [];
			foreach($participants as $participant) {
				       $participantsListe[] = Participant::findOrFail($participant->participant_id)->prenom." ".Participant::findOrFail($participant->participant_id)->nom;
			}?>
			<h1>Participant 1</h1>
			{{ Form::select('participantsListe', $participantsListe, array_values($participantsListe)[0], array('id' => 'participantsListe')) }}
			<h1>Participant 2</h1>
			{{ Form::select('participantsListe2', $participantsListe, array_values($participantsListe)[0], array('id' => 'participantsListe2')) }}
			
		
		@else
			<h1>Pas un tournoi!</h1>		
		@endif	
	@endif