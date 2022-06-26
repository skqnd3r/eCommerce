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
                <h2 class="reg">{{ Session::get('user.firstname') }} {{ Session::get('user.lastname') }}</h2>
                <form id="reset" method="POST" action="{{ route('pass.update') }}">
                    @csrf
                    @if ($errors->has('password'))
                        <input type="password" name="password" class="text error" placeholder="Nouveau mot de passe">
                    @else
                        <input type="password" name="password" class="text" placeholder="Nouveau mot de passe">
                    @endif

                    @if ($errors->has('cpassword'))
                        <input type="password" name="cpassword" class="text error" placeholder="Confirmation du mot de passe">
                    @else
                        <input type="password" name="cpassword" class="text" placeholder="Confirmation du mot de passe">
                    @endif
                </form>
                <input id="validate" type="submit" form="reset" class="button" value="Valider">
            </div>
        </div>
    </div>
@endsection
