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
            <h1 class="reg">{{ Session::get('user.firstname') }}<br>{{ Session::get('user.lastname') }}</h1>
            <form class="log" method="POST" action="{{ route('pass.update') }}">
                @csrf
                <input type="password" name="password" class="reg" placeholder="Nouveau mot de passe"><br>
                @if ($errors->has('password'))
                    <p class="error">{{ $errors->first('password') }}</p>
                @endif
                <input type="password" name="cpassword" class="reg"
                    placeholder="Confirmation du nouveau mot de passe"><br>
                @if ($errors->has('cpassword'))
                    <p class="error">{{ $errors->first('cpassword') }}</p>
                @endif
                <input type="submit" class="button" value="Valider"><br>
            </form>
        </div>
    </div>
@endsection
