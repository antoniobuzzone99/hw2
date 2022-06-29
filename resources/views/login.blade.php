<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div id="page">
        <img class="foto" src="img/copertina.jpg">
        <section>
            <img class="logo" src="img/user.png">
            <div id='box'>
                @if($error == 'errore')
                    <div class = errore >Username e/o password errati</div>
                @endif
                <form id = 'form' name='login' method='post' action="{{route('checkUser')}}">
                    @csrf
                    <div class = 'box1'>
                        <div class="username">
                            <label>Username</label><input type='text' name='username'>
                        </div>
                    </div>
                    <div class = 'box1'>
                        <div class="password">
                            <label>Password</label><input type='password' name='password'>
                        </div>
                    </div>
                    <div class = 'box1'>
                        <div class="submit"><input id="accedi" type='submit' value="Accedi"></div>
                    </div>
                </form>
                <div class="signup">Non hai un account? <a href="{{ route('signup') }}">Registrati!</a></div>
            </div>
        </section>
        <a class="icone0" href="{{ route('home') }}"><img src="img/home.png"></a>
    </div>
</body>
</html>