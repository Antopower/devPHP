	@if ($epreuves->isEmpty())
		<p>Aucun épreuves disponibles!</p>
	@else

			<?php $epreuvesListe = [];
			foreach($epreuves as $epreuve) {
				$epreuvesListe[$epreuve->id] = $epreuve->nom;
			}?>
			{{ Form::select('epreuvesListe', $epreuvesListe, array_values($epreuvesListe)[0], array('id' => 'epreuvesListe')) }}</td>

	@endif
