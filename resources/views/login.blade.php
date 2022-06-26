@extends('layouts.default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/login.css">
@endsection

@section('head')
    <title>Login</title>
@endsection

@section('body')
    <div class="window">
        <div class="container">
            <div class="content">
                <h2 class="head">Connexion</h2>
                <form class="log" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if ($errors->has('email'))
                        <input class="login text error" name="email" placeholder="Email"><br>
                    @else
                        <input class="login text" name="email" placeholder="Email"><br>
                    @endif

                    @if ($errors->has('password'))
                        <input class="login text error" type="password" name="password" placeholder="Mot de passe"><br>
                    @else
                        <input class="login text" type="password" name="password" placeholder="Mot de passe"><br>
                    @endif

                    <a class="link " href="{{ route('reset') }}"><p>J'ai oublié mon mot de passe</p></a>
                    <div class="redir">
                        <a href="{{ route('register') }}">
                            <input class="button" type="button" value="Inscription">
                        </a>
                        <input class="button" type="submit" value="Connexion">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
