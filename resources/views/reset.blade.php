@extends('layouts/default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
@endsection

@section('head')
    <title>Panier</title>
@endsection

@section('body')
    <div class="window">
        <div class="res">
            <h1 class="res">Veuillez renseigner votre adresse e-mail afin de recevoir votre nouveau mot de passe.
            </h1>
            <form class="log" action="{{ route('reset') }}" method="POST">
                @csrf
                <input class="res" placeholder="Email" name="email">
                @if ($errors->has('email'))
                    <p class="error">{{ $errors->first('email') }}</p>
                @endif
                <input type="submit" class="button" value="Réinitialiser">
            </form>
        </div>
    </div>
@endsection
