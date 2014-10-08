<!doctype html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <title>Connection à un compte</title>
            {{-- Imports twitter bootstrap and set some styling --}}
            <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
             <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
             <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body { background-color: #EEE; } 
        </style>
        <script src="{{ asset('assets/js/script.js') }}"></script> 
    </head>
    <body>
        <div class="container">
           
            {{-- Renders the signup form of Confide --}}
            {{ Form::open(['action'=> 'UsersController@doLogin', 'class' => 'form-signin']) }}
             <h2 class="form-signin-heading">Connectez-vous!</h2>
            <div class="form-group">
				{{ Form::text('username',null, array('placeholder'=>'Utilisateur',  'class'=>'form-control', 'required', 'onInvalid' =>'InvalidMsg(this);','autofocus')) }}
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
        
    </body>
</html>
