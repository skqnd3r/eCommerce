@extends('layouts/default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
@endsection

@section('head')
    <title>Panier</title>
@endsection

@section('body')
    <div class="window">
        <div class="container">
            <div class="content">
                <h3 class="res">Veuillez renseigner votre adresse e-mail <br>afin de recevoir votre nouveau mot de passe.</h3>
                <form class="log" action="{{ route('reset') }}" method="POST">
                    @csrf
                    @if ($errors->has('email'))
                        <input class="text error" placeholder="Email" name="email">
                    @else
                        <input class="text" placeholder="Email" name="email">
                    @endif
                    <input type="submit" class="button" value="Réinitialiser">
                </form>
            </div>
        </div>
    </div>
@endsection
