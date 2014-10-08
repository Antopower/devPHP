@extends('layout')
@section('content')
	
	<div class="container-fluid">
		<section class="section-padding">
			<div class="jumbotron text-left">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1> Une erreure c'est produite</h1>
						<p>{{$e->getMessage()}}</p>
						<a href="{{ action('HomeController@index') }}" class="btn btn-info">Retour à la page principale</a>					
					</div>
				</div>
			</div>
		</section>
	</div>
	
@stop