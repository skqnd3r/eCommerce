@extends('layouts/default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/register.css">
@endsection

@section('head')
    <title>Register</title>
@endsection

@section('body')
    <div class="window">
        <div class="container">
            <div class="content">
                <h2>Inscription</h2>
                <a class="link" href="{{ route('login') }}">
                    <p>Vous êtes déjà inscrit ?</p>
                </a>
                <form class="form" id="register" method="POST" action="{{ route('user.create') }}">
                    @csrf
                    <ul class="form">
                        <li>
                            <label class="form" for="lastname">Nom</label>
                            @if ($errors->has('lastname'))
                                <input type="text" name="lastname" class="text error" placeholder="*champ obligatoire">
                            @else
                                <input type="text" name="lastname" class="text">
                            @endif
                        </li>
                        <li>
                            <label class="form" for="firstname">Prénom</label>
                            @if ($errors->has('firstname'))
                                <input type="text" name="firstname" class="text error" placeholder="*champ obligatoire">
                            @else
                                <input type="text" name="firstname" class="text">
                            @endif
                        </li>
                        <li>
                            <label class="form" for="email">Email</label>
                            @if ($errors->has('email'))
                                <input type="text" name="email" class="text error" placeholder="*champ obligatoire">
                            @else
                               <input type="text" name="email" class="text">
                            @endif
                        </li>
                        <li>
                            <label class="form" for="password">Mot de passe</label>
                            @if ($errors->has('password'))
                                <input type="password" name="password" class="text error" placeholder="*champ obligatoire">
                            @else
                                <input type="password" name="password" class="text">
                            @endif
                        </li>
                        <li>
                            <label class="form" for="cpassword">Confirmation<br>du mot de passe</label>
                            @if ($errors->has('cpassword'))
                                <input type="password" name="cpassword" class="text error" placeholder="*champ obligatoire">
                            @else
                                <input type="password" name="cpassword" class="text">
                            @endif
                        </li>
                    </ul>
                    <input type="submit" form="register" class="button" value="Valider"><br>
                </form>
            </div>

        </div>
    </div>
@endsection
