@extends('layout')
@section('content')

<section class="header section-padding">
	<div class="container">
		<div class="header-text">
			<h1>Création</h1>
			<p>Page de création d'un participant</p>
		</div>
	</div>
</section>

<div class="container">
	<section class="section-padding">
		<div class="jumbotron text-left">
			<h1>Création d'un participant</h1>
			{{ Form::open(['action'=> 'ParticipantsController@index', 'class' => 'form', 'id' => 'bob']) }}
			<div class="form-group">
				{{ Form::label('nom', 'Nom:') }} 
				{{ Form::text('nom',null, array('class' => 'form-control', 'id' => 'formId')) }}
				<p style="color: red">{{ $errors->first('nom') }}</p>
			</div>
			
			<div class="form-group">
				{{ Form::label('prenom', 'Prénom:') }} 
				{{ Form::text('prenom',null, ['class' => 'form-control']) }}
				<p style="color: red">{{ $errors->first('prenom') }}</p>			
			</div>
			
			<div class="form-group">
				{{ Form::label('numero', 'Numéro:') }} 
				{{ Form::text('numero',null, ['class' => 'form-control']) }}
				<p style="color: red">{{ $errors->first('numero') }}</p>			
			</div>
			
			<div class="form-group">
				{{ Form::label('region_label', 'Région:') }} 
				{{ Form::select('region', $region) }}			
			</div>

			<div class="form-group">
			<p style="color: red">{{ $errors->first('sport_checkbox') }}</p>
			<table class="table">
			@foreach($sports as $sport)
			<tr>
				<td>{{ Form::label('nomSport',$sport->nom) }} </td>
				<td><input type="checkbox" name="sport_checkbox[]" value="<?php echo $sport->id ?>"  /></td>
			</tr>
			@endforeach
			</table>		
			</div>
	
			<div class="form-group">
				{{ Form::submit('Créer', ['class' => 'btn btn-primary'])}}
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