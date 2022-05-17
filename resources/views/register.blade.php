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
            <h1 class="head">Inscription</h1>

            <a id="reg_redir" href="{{ route('login') }}">Vous êtes déjà inscrit ?</a>

            <form class="form" id="register" method="POST" action="{{ route('user.create') }}">
                @csrf
                <div class="table">
                    <label class="form" for="lastname">Nom</label>
                    <input type="text" name="lastname" class="reg"><br>
                    @if ($errors->has('lastname'))
                        <p class="error">{{ $errors->first('lastname') }}</p>
                    @endif
                </div>

                <div class="table">
                    <label class="form" for="firstname">Prénom</label>
                    <input type="text" name="firstname" class="reg"><br>
                </div>
                @if ($errors->has('firstname'))
                    <p class="error">{{ $errors->first('firstname') }}</p>
                @endif

                <div class="table">
                    <label class="form" for="email">Email</label>
                    <input type="text" name="email" class="reg"><br>
                    @if ($errors->has('email'))<p class="error">{{ $errors->first('email') }}</p>@endif
                </div>

                <div class="table">
                    <label class="form" for="password">Mot de passe</label>
                    <input type="password" name="password" class="reg"><br>
                    @if ($errors->has('password'))
                        <p class="error">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="table">
                    <label class="form" for="cpassword">Confirmation<br>du mot de passe</label>
                    <input type="password" name="cpassword" class="reg"><br>
                    @if ($errors->has('cpassword'))
                        <p class="error">{{ $errors->first('cpassword') }}</p>
                    @endif
                </div>
            </form>

            <div class="submit">
                <input type="submit" form="register" class="button" value="Valider"><br>
            </div>
        </div>
    </div>
@endsection
