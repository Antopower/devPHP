<!doctype html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <title>Création d'un compte</title>
            {{-- Imports twitter bootstrap and set some styling --}}
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <style>
        body { background-color: #EEE; } ‘
        .maincontent {
            background-color: #FFF;
            margin: auto;
            padding: 20px;
            width: 300px;
            box-shadow: 0 0 20px #AAA;
        }
        </style>
    </head>
    <body>
        <div class="maincontent">
            <h1>Création d'un compte</h1>
            {{-- Renders the signup form of Confide --}}
            {{ Confide::makeSignupForm()->render(); }}
        </div>
    </body>
</html>
