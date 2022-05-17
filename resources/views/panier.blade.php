@extends('layouts/default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/panier.css">
@endsection

@section('head')
    <title>Panier</title>
@endsection

@section('body')
    <script></script>
    <div class="window">
        <div class="container">
            <div class="cart">
                @foreach ($cart as $element)
                    @foreach ($products as $product)
                        @if ($product->id == $element->id)
                            <div class="product">
                                <div class="image">
                                    <img src="{{ $product->img }}" alt="{{ $product->alt }}" width="50px">
                                </div>
                                <div>{{ $product->title }}</div>
                                <div class="price">{{ $product->price }}</div>
                                <button onclick="addincart(-1,{{ $product->id }},{{ $product->quantity }})"
                                    class="button, minus">-</button>
                                <p class="quant">{{ $element->quant }}</p>
                                <button onclick="addincart(1,{{ $product->id }},{{ $product->quantity }})"
                                    class="button, plus">+</button>
                                <button class="remove" onclick="remove({{ $product->id }})">X</button>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <div class="sum">
                <h1>Total</h1>
                <span id="total"></span><span></span>
                <button class="button" onclick="send()">Payer</button>
            </div>

        </div>
    </div>
@endsection
