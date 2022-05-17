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
            <h2 class="head">Connexion</h2>
            <form class="log" action="{{ route('login') }}" method="POST">
                @csrf
                <input class="login" name="email" placeholder="Email"><br>
                @if ($errors->has('email'))
                    <p class="error">{{ $errors->first('email') }}</p>
                @endif

                <input class="login" type="password" name="password" placeholder="Mot de passe"><br>
                @if ($errors->has('password'))
                    <p class="error">{{ $errors->first('password') }}</p>
                @endif

                @if (Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif

                <a href="{{ route('reset') }}">J'ai oublié mon mot de passe</a><br>

                <div class="redir">
                    <a href="{{ route('register') }}">
                        <input class="button" type="button" value="Inscription">
                    </a>
                    <input class="button" type="submit" value="Connexion"><br>
                </div>
            </form>
        </div>
    </div>
@endsection
