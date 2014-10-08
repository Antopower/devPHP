@extends('layout')
@section('content')

<section class="header section-padding">
	<div class="container">
		<div class="header-text">
			<h1>Création</h1>
			<p>Page de création d'une épreuve</p>
		</div>
	</div>
</section>

<div class="container">
	<section class="section-padding">
		<div class="jumbotron text-left">
			<h1>Création d'une épreuve</h1>
			{{ Form::open(['action'=> ['EpreuvesController@index'], 'class' => 'form']) }}
			<div id="liste-sports">
				<?php $sportsListe = [];
				foreach($sports as $sport) {
					$sportsListe[$sport->id] = $sport->nom;
				}?>
				{{ Form::select('sportsListe', $sportsListe, $sportId, array('id' => 'sportsListe')) }}
			</div> <!-- liste-sports -->
			<div class="form-group">
				{{ Form::label('nom', 'Nom:') }} 
				{{ Form::text('nom',null, ['class' => 'form-control']) }}
				{{ $errors->first('nom') }}
			</div>
			
			<div class="form-group">
				{{ Form::label('description', 'Description courte:') }} 
				{{ Form::text('description',null, ['class' => 'form-control']) }}
				{{ $errors->first('description') }}				
			</div>
			<div class="form-group">
				{{ Form::submit('Créer', ['class' => 'btn btn-primary'])}}
				<a href="{{ action('EpreuvesController@index') }}?sportId=<?php echo $sportId; ?>" class="btn btn-warning">Annuler</a>
			</div>
			{{ Form::close() }}
		</div>
	</section>
</div>
@stop