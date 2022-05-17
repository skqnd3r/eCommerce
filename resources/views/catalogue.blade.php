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
            <a href="{{ route('produit/{id}', [$product->id]) }}">
                <div class="container">
                    <img class="product" src="{{ $product->img }}" alt="{{ $product->alt }}" width="100"
                        height="100">
                    <h3>{{ $product->title }}</h3>
                    <ul>
                        <li>
                            <p>{{ $product->price }}</p>
                        </li>
            </a>
            <li>
                @auth
                    <button onclick="shortadd({{ $product->id }},{{ $product->quantity }})" class="label">Acheter maintenant</button>
                @endauth
                @guest
                    <a href="{{ route('login') }}">
                        <button class="label">Acheter maintenant</button>
                    </a>
                @endguest
            </li>
            </ul>
    </div>

    @endforeach
    </div>

@endsection
