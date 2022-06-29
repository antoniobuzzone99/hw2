<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200&display=swap" rel="stylesheet">
        <title>Signup</title>
        <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
        <script src="{{ asset('js/signup.js') }}" defer="true"></script>
    </head>
    <body>
    <div id="page">
        <img class="foto" src="img/copertina.jpg">
        <section>
            <h1>Iscriviti!</h1>
            <div id='box'>
                <form id="form" name='signup' method='post' action="{{route('createUser')}}">
                    @csrf 
                    <div class='box1'>
                        <div class="nome">
                            <label>Nome</label><input type="text" name="nome">
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="cognome">
                            <label>Cognome</label><input type="text" name="cognome">
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="username">
                            <label>Username</label><input type="text" name="username">
                        </div>  
                    </div>
                    <div class='box1'>
                        <div class="data">
                            <label>Data di Nascita</label><input type="date" name="data">
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="email">
                            <label>Email</label><input type="text" name="email">
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="password">
                            <label>Password</label><input type='password' name='password'>
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="conferma_password">
                            <label>Conferma Password</label><input type='password' name='conferma_password'>
                        </div>
                    </div>
                    <div class='box1'>
                        <div class="submit">
                            <input id="accedi" type='submit' value="Registrati">
                        </div>
                    </div>
                </form>
                <div class="signup">Hai un account? <a href="{{ route('login') }}">Accedi!</a></div>
            </div>
        </section>
        <a class="icone0" href="{{ route('home') }}"><img src="img/home.png"></a>
    </div>
    </body>
</html>