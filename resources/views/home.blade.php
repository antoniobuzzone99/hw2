<!DOCTYPE html>
<html>
    <head>
        <title>hw2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <nav id="menu">
            @if($user_id == null)
                <div></div>
                <a class='icone0' href="{{ route('login') }}"><img src='img/login.png'></a>;
            @else
                <div class= benv0>
                <div class='benv'>Benvenuto</div>
                <div class='nome'>{{ $user_id['username']}}</div>
                </div>
                <a class='icone1' href="{{ route('profilo') }}"><img src='img/profilo.png'></a>
                <a class='icone2' href="{{ route('logout') }}"><img src='img/logout.png'></a>
            @endif
        </nav>
        <header>
            <div id = "overlay">
                <div id='intro'>
                    <h1><strong>CAMPIONI D'ITALIA</strong></h1>
                    <img id="intro_img" src="img/scudetto.png">
                </div>
                @if($user_id == null)
                    <h2><a href="{{ route('login') }}">Scopri</a></h2>
                @else
                    <h2><a href="{{ route('blog') }}">Scopri</a></h2>
                @endif
            </div>
        </header>
        <footer>
            <img class="footerimg" src="img/facebook.png">
            <img class="footerimg" src="img/twitter1.png">
                bzznns99h13c351m@studium.unict.it/ github: antoniobuzzone99<br>
                1000002102/ ingegneria informatica a.a: 2021-2022
            </div>
            <img class="footerimg" src="img/yt.png">
            <img class="footerimg" src="img/instagram.png">
        </footer>
    </body>
</html>