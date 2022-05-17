@extends('layouts.default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
@endsection

@section('head')
    <title>Administration</title>
@endsection

@section('body')
    <div class="window">
        <div class="container">
            <h2>Ajouter un produit :</h2>
            <form class="form" id="admin" action="{{ route('create.product') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="table">
                    <label class="form" for="title">Titre</label>
                    <input type="text" class="form input" name="title"><br>
                    @if ($errors->has('title'))
                        <p class="error">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="table">
                    <label class="form" for="img">Image</label>
                    <input type="file" class="form" id="up_img" name="img"><br>
                    @if ($errors->has('img'))
                        <p class="error">{{ $errors->first('img') }}</p>
                    @endif
                </div>
                <div class="table">
                    @if ($errors->has('alt'))
                        <p class="error">{{ $errors->first('alt') }}</p>
                    @endif
                </div>
                <div class="table">
                    <label class="form" for="desc">Description</label>
                    <textarea class="form input" name="desc" form="admin"></textarea>
                    @if ($errors->has('desc'))
                        <p class="error">{{ $errors->first('desc') }}</p>
                    @endif
                </div>
                <div class="table">
                    <label class="form" for="price">Prix</label>
                    <input type="number" step="0.01" min="0" class="form input" name="price"><br>
                    @if ($errors->has('price'))
                        <p class="error">{{ $errors->first('price') }}</p>
                    @endif
                </div>

                <div class="table">
                    <label class="form" for="type">Quantité</label>
                    <input type="number" class="form input" name="quant"><br>
                    @if ($errors->has('quant'))
                        <p class="error">{{ $errors->first('quant') }}</p>
                    @endif
                </div>
            </form>

            <div class="submit">
                <input form="admin" class="button" type="submit" value="Ajouter">
            </div>
        </div>
    </div>
@endsection