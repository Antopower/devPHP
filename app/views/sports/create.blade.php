@extends('layout')
@section('content')

<section class="header section-padding">
	<div class="container">
		<div class="header-text">
			<h1>Création</h1>
			<p>Page de création d'un sport</p>
		</div>
	</div>
</section>

<div class="container">
	<section class="section-padding">
		<div class="jumbotron text-left">
			<h1>Création d'un sport</h1>
			{{ Form::open(['action'=> 'SportsController@index', 'class' => 'form']) }}
			<div class="form-group">
				{{ Form::label('nom', 'Nom:') }} 
				{{ Form::text('nom',null, ['class' => 'form-control']) }}
				{{ $errors->first('nom') }}
			</div>
			<div class="form-group">
				{{ Form::label('saison', 'Saison:') }} 
				{{ Form::radio('saison','h', true, ['id'=>'hiver', 'class' => 'radio-inline']) }} hiver
				{{ Form::radio('saison','e', false, ['id'=>'ete', 'class' => 'radio-inline']) }} été
				{{ $errors->first('saison') }}				
			</div>
			
			<div class="form-group">
				{{ Form::label('description_courte', 'Description courte:') }} 
				{{ Form::text('description_courte',null, ['class' => 'form-control']) }}
				{{ $errors->first('description_courte') }}				
			</div>
			<div class="form-group">
				{{ Form::label('url_logo', 'Url du logo:') }} 
				{{ Form::text('url_logo',null, ['class' => 'form-control']) }}
				{{ $errors->first('url_logo') }}							
			</div>	
			<div class="form-group">
				{{ Form::label('url_page_officielle', 'Url de la page officielle:') }} 
				{{ Form::text('url_page_officielle',null, ['class' => 'form-control']) }}
				{{ $errors->first('url_page_officielle') }}				
			</div>	
			<div class="form-group">
				{{ Form::label('tournoi', 'tournoi:') }} 
				{{ Form::checkbox('tournoi',null, ['class' => 'form-control']) }}
				{{ $errors->first('tournoi') }}				
			</div>	
			<div class="form-group">
				{{ Form::submit('Créer', ['class' => 'btn btn-primary'])}}
				<a href="{{ action('SportsController@index') }}" class="btn btn-warning">Annuler</a>
			</div>
			{{ Form::close() }}
		</div>
	</section>
</div>
@stop