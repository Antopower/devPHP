<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Jeux du Québec</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-site.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/navbar-fixed-top.css') }}">
	<link rel="stylesheet" href="{{ asset('css/signin.css') }}">

</head>
<body>
<header>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
		
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-principal">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ action('HomeController@index') }}">Jeux Du Québec</a>
				<!--  <p class="navbar-text navbar-left">Bienvenue <?php echo(Confide::user() ? Confide::user()->username : 'visiteur') ?></p> --> 
			</div>
			<div class="collapse navbar-collapse" id="menu-principal">
				
				<ul class="nav navbar-nav">
				 <li class="active"><a href="{{ action('HomeController@index') }}">Accueil</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li></li>
					@if(Confide::user() == "")
						<li><a href="#cconnexion" role="button" data-toggle = "modal">Connexion</a></li>
					@else
						<li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion <span class="caret"></span></a>
			              <ul class="dropdown-menu" role="menu">
			                <li><a href="{{ action('SportsController@index') }}">Gestion des Sports</a></li>
							<li><a href="{{ action('EpreuvesController@index') }}">Gestion des Épreuves</a></li>
							<li><a href="{{ action('ParticipantsController@index') }}">Gestion des Participants</a></li>
							<li><a href="{{ action('CompetitionsController@index') }}">Gestion des Compétitions</a></li>	
			              </ul>
			            </li>
						<li><a href="{{ action('UsersController@logout') }}">Deconnexion</a></li>
					@endif
					
				</ul>
			</div>
		</div>
	</nav>
</header>

<div style="width:200px">
<div id="cconnexion" class="modal fade bs-modal-sm" role ="dialog">

	<div class = "modal-sm modal-dialog">
		<div class = "modal-content">
			<div class ="modal-header">
				<h3 class="form-signin-heading">Connectez-vous!</h3>
			</div>
			<div class ="modal-body">
				{{ Form::open(['action'=> 'UsersController@doLogin', 'class' => 'form-signin']) }}
	            
	            <div class="form-group">
					{{ Form::text('username',null, array('placeholder'=>'Utilisateur',  'class'=>'form-control', 'required', 'onInvalid' =>'InvalidMsg(this);','autofocus', 'id'=>'usernameText')) }}
					{{ $errors->first('username') }}
					
					{{ Form::password('password',array('placeholder'=>'Mot de Passe',  'class'=>'form-control', 'required', 'onInvalid' =>'InvalidMsg(this);')) }}
					{{ $errors->first('password') }}			
				</div>
			
				<div class="form-group">
					{{ Form::submit('Connexion', ['class' => 'btn btn-lg btn-primary btn-block'])}}
				</div>
				{{ Form::close() }}
			</div>
			
		</div>
	</div>
</div>
</div>
@yield('content')
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>