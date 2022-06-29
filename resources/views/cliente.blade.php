<!DOCTYPE html>
<html>
    <head>
        <title>cliente</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/cliente.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200&display=swap" rel="stylesheet">
        <script src="{{ asset('js/cliente.js') }}" defer="true"></script>
    </head>
    <body>
    <header>
        <div id = "overlay">
            <nav id="menu">
                <div></div>
                <div id="dx">
                    <a class="icone0" href="{{ route('home') }}"><img src="img/home.png"></a>
                    <a class="icone1" href="{{ route('blog') }}"><img src="img/post.png"></a>
                    <a class="icone2" href="{{ route('logout') }}"><img src="img/logout.png"></a>
                </div>
            </nav>
        </div>
    </header>
    <div id = "flex1">
        <img  id= "img1" src="img/profilo1.jpg">
        <div class='n_c'>{{ $user_id['nome']}} {{ $user_id['cognome']}}</div>
        <div class='u_a'>ultimo aggiornamento: <strong>online</strong></div>
    </div>
    <section>
        <form name="post" method='post' id='form'>
            @csrf
            <div id='box2'>
                <input type="submit" value = "genera un logo casuale" id="cerca">
                <div id="risposta"></div>
            </div>
            <div class = "submit hidden" id= 'sub1'>
                <label">Scrivi qualcosa...</label><input type="text" name="descrizione" id="descr">
            </div>
            <div class="submit hidden" id = 'sub2'>
                <input type="submit" value="carica post" id="carica">
            </div>
            <div id='box_pref'>
                <input type="submit" value = "visualizza i post preferiti" id="preferiti">
                <div id="risposta1"></div>
            </div>
        </form>
    </section>
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