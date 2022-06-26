<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/layout/style.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/layout.css">
    <link rel="stylesheet" type="text/css" href="/css/layout/presets.css">
    @yield('css')
    <script type="text/javascript" src="/js/cookie.js"></script>
    @auth
        <script type="text/javascript" src="/js/panier.js"></script>
    @endauth
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    @yield('head')
</head>



<header>
    <div class="header h_back"></div>
    <div class="header nav">
        <a class="title_site" href="{{ route('catalogue') }}">
            <h1 class="title_site">Shoptafleur</h1>
        </a>
        <img id="logo" src="/resources/site/logo_white.svg" alt="logo" width="100px">
        <ul id="navigation">
            @auth
                <li class="navigation">
                    <img onclick="" class="not_allowed" id="logo_panier" src="/resources/site/icon_panier.svg" alt="logo_panier" width="30px">
                </li>
            @endauth

            @admin
                <li class="navigation">
                    <a class="navigation" href="{{ route('admin') }}">
                        <button class="navigation">Ajouter</button>
                    </a>
                </li>
            @endadmin
            
            <li class="navigation">
                @auth
                    <form class="navigation" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="navigation disconnect"><span>{{ Auth::user()->firstname }}</span></button>
                    </form>
                @endauth
                @guest
                    <a class="navigation" href="{{ route('login') }}">
                        <button class="navigation">S'identifier</button>
                    </a>
                @endguest
            </li>
        </ul>
    </div>
</header>

<div id="h_rad"></div>
<div id="h_line"></div>

@auth
<body onload="addcookie()">
@endauth
@guest
<body onload="addcookie()">
@endguest
    <div hidden class="cookie"></div>
    <div hidden class="cookie" id="c_div">
        <p>Autorisez-vous l'utilisation des cookies ?</p>
        <div id="c_buttons">
            <button class="button" id="cookieno" onclick="refusecookie()">Non</button>
            <button class="button" id="cookieyes" onclick="acceptcookie()">Oui</button>
        </div>
    </div>
    @yield('body')
</body>

<div class="corner">
    <div id="fog"></div>
    <img class="corner" id="left" src="/resources/site/Footer_left.png" alt="plant_left" height="200vw">
    <img class="corner" id="right" src="/resources/site/Footer_right.png" alt="plant_right"
        height="200vw">
</div>

<div id="f_rad"></div>
<div id="f_line"></div>

<footer>
    <div class="footer_nav">
        <a class="footer_nav" href="https://twitter.com/fleures_les" target="_blank">
            <img class="footer_nav" id="logo_twitter" src="/resources/site/icon_twitter.svg" alt="twitter_logo"
                width="35px">
        </a>
        <a class="footer_nav" href="https://fr-fr.facebook.com" target="_blank">
            <img class="footer_nav" id="logo_facebook" src="/resources/site/icon_facebook.svg"
                alt="facebook_logo" width="35px">
        </a>
    </div>
    <p id="copyright">© ShopTaFleur | 2021 </p>
</footer>

</html>
