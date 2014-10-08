@extends('layout')
@section('content')

<section class="header section-padding">
	<div class="container">
		<div class="header-text">
			<h1>Modification</h1>
			<p>Page d'édition d'un participant</p>
		</div>
	</div>
</section>

<div class="container">
	<section class="section-padding">
		<div class="jumbotron text-left">
			<h1>Modification d'un participant</h1>
			{{ Form::open(['action'=> array('ParticipantsController@update', $participant->id), 'method' => 'PUT', 'class' => 'form', 'id' => 'bob']) }}
			<div class="form-group">
				{{ Form::label('nom', 'Nom:') }} 
				{{ Form::text('nom',$participant->nom, ['class' => 'form-control']) }}
				{{ $errors->first('nom') }}
			</div>
			
			<div class="form-group">
				{{ Form::label('prenom', 'Prénom:') }} 
				{{ Form::text('prenom',$participant->prenom, ['class' => 'form-control']) }}
				{{ $errors->first('prenom') }}
			</div>
			
			<div class="form-group">
				{{ Form::label('numero', 'Numéro:') }} 
				{{ Form::text('numero',$participant->numero, ['class' => 'form-control']) }}
				{{ $errors->first('numero') }}
			</div>
			
			<div class="form-group">
				{{ Form::label('region_label', 'Région:') }} 
				{{ Form::select('region', $region, $participant->region_id) }}			
			</div>
			
			<div class="form-group">
				<table class="table">
					@foreach($sports as $sport)
					<tr>
						<td>{{ Form::label('nomSport',$sport->nom) }} </td>
						@if($sport->id == $participants_sports[$i]->sport_id)
							<td><input type="checkbox" name="sport_checkbox[]" value="<?php echo $sport->id ?>" checked /></td>
							<?php $i = $i + 1; ?>
							@if($i == $PSCount)
								<?php $i=0; ?>	
							@endif							
						@else
							<td><input type="checkbox" name="sport_checkbox[]" value="<?php echo $sport->id ?>" /></td>
						@endif
					</tr>
					@endforeach
				</table>		
			</div>
			
			<div class="form-group">
				{{ Form::submit('Sauvegarder', ['class' => 'btn btn-primary'])}}
				<a href="{{ action('ParticipantsController@index') }}" class="btn btn-warning">Annuler</a>
			</div>
			{{ Form::close() }}
		</div>
	</section>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#bob').submit(function() {
        var $fields = $(this).find('input[name="sport_checkbox[]"]:checked');
        if (!$fields.length) {
            alert('Vous devez sélectionner au moins 1 sport!');
            return false; // The form will *not* submit
        }
    });
});
</script>
@stop