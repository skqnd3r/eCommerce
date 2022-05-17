@extends('layouts/default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/produit.css">
@endsection

@section('head')
    <title>{{ $product->title }}</title>
    @auth @admin
        <script type="text/javascript" src="/js/admin.js"></script>
    @endadmin @endauth
@endsection

@section('body')
    <div class="window">
        <div class="container">
            {{-- table --}}
            <div class="image">
                <img src="{{ $product->img }}" alt="{{ $product->alt }}" width="100px">
            </div>

            <div class="description">
                <h1 class="description">{{ $product->title }}</h1>
                <div class="description">
                    <p id="desc">{{ $product->description }}</p>
                </div>
                <label for="quantity">Quantité</label>
                <button onclick="productquant(-1,{{ $product->quantity }})" id="minus" class="button">-</button>
                <span id="quant">1</span>
                <button onclick="productquant(1,{{ $product->quantity }})" class="button">+</button><br>
                <label for="quantity">Stock</label>
                <span id="stock">{{ $product->quantity }}</span>
                <p id="prix">{{ $product->price }}&euro;</p>
                @guest
                    <a href="{{ route('login') }}">
                        <button class="label">Ajouter au panier</button>
                    </a>
                @endguest

                @auth
                    <button onclick="addproductquant({{ $product->id }},{{ $product->quantity }})"
                        class="label">Ajouter au panier</button>
                @endauth
                @auth @admin
                    <button onclick="updateform()" id="updatebutton" class="label">Modifier</button>
                @endadmin @endauth
            </div>
        </div>
        @auth @admin
        <div hidden id="update">
            <form class="form" id="admin" action="{{ route('update.product/{id}', [$product->id]) }}"
                method="POST" enctype="multipart/form-data">
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
        @endadmin @endauth
    </div>
@endsection
