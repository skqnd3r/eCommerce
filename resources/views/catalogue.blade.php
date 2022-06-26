@extends('layouts.default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/catalogue.css">
@endsection

@section('head')
    <title>Catalogue</title>
@endsection

@section('body')
    <div class="window">
        @foreach ($products as $product)
        
            <div class="container">
                <a class="product" href="{{ route('produit/{id}', [$product->id]) }}">
                    <img class="product" src="{{ $product->img }}" alt="{{ $product->alt }}" width="1000px" height="1000px">
                </a>
                <h3 class="product">{{ $product->title }}</h3>
                <p class="product">{{ $product->price }}</p>
                @auth
                    <button class="button not_allowed">Ajouter au panier</button>
                @endauth

                @guest
                    <a href="{{ route('login') }}">
                        <button class="button">Ajouter au panier</button>
                    </a>
                @endguest
            </div>
        @endforeach
    </div>
@endsection