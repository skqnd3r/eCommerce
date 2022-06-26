@extends('layouts/default')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/produit.css">
@endsection

@section('head')
    <title>{{ $product->title }}</title>
    <script type="text/javascript" src="/js/panier.js"></script>
    @auth @admin
        <script type="text/javascript" src="/js/admin.js"></script>
    @endadmin @endauth
@endsection

@section('body')
    <div class="window">
        <div class="container">
            <div class="content">
                <div class="product">                
                    <img class="product" src="{{ $product->img }}" alt="{{ $product->alt }}" width="100px">
                    <ul class="product">
                        <li>
                            <h2>{{ $product->title }}</h2>
                            <label for="quantity">Stock <span id="stock">{{ $product->quantity }}</span></label>
                        </li>
                        <li class="item">
                            <label class="green">Description</label>
                            <p>{{ $product->description }}</p>
                            <p id="prix" class="green">{{ $product->price }}&euro;</p>
                        </li>
                        <li id="add" class="item">
                            <div id="select" class="i_add">
                                <a onclick="productquant(-1,{{ $product->quantity }})" id="minus" class="n_button">
                                    <span class="minus">-</span>
                                </a>
                                <span id="quant" class="green">1</span>
                                <a onclick="productquant(1,{{ $product->quantity }})" class="n_button" id="plus">
                                    <span>+</span>
                                </a>
                            </div>
                            @guest
                                <a href="{{ route('login') }}">
                                    <button class="i_add button">Ajouter au panier</button>
                                </a>
                            @endguest
                            @auth
                                <button class="i_add button not_allowed">Ajouter au panier</button>
                            @endauth
                        </li>
                    </ul>
                </div>
                @auth @admin
                    <button onclick="updateform()" id="updatebutton" class="button">Modifier</button>
                @endadmin @endauth
            </div>
        </div>
            
        @auth @admin
        <div hidden id="update">
            <div class="content2">
                <form class="form" id="admin" action="{{ route('update.product/{id}', [$product->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="form">
                        <li>
                            @if ($errors->has('title'))
                                <label class="error">Titre</label>
                            @else
                                <label>Titre</label>
                            @endif
                                <input type="text" class="text" name="title">
                        </li>                    
                        <li>
                            @if ($errors->has('img'))
                                <label class="form error" for="img">Image</label>
                            @else
                                <label class="form" for="img">Image</label>
                            @endif
                            <div class="in_file">
                                <input type="file" class="button" id="up_img" name="img">
                                <label for="up_img">Choose a file ...</label>
                            </div>
                        </li>

                        <li>
                            @if ($errors->has('desc'))
                                <label class="form error" for="desc">Description</label>
                            @else
                                <label class ="form" for="desc">Description</label>
                            @endif
                            <textarea name="desc" form="admin"></textarea>
                        </li>

                        <li>
                            @if ($errors->has('price'))
                                <label class="form error" for="price">Prix</label>
                            @else
                                <label class="form" for="price">Prix</label>
                            @endif
                            <input type="text" class="text" name="price">
                        </li>

                        <li>
                            @if ($errors->has('quant'))
                                <label class="form error" for="type">Quantité</label>
                            @else
                                <label class="form" for="type">Quantité</label>
                            @endif
                            <input type="text" class="text" name="quant">
                        </li>
                    </ul>
                    <input class="button" type="submit" value="Ajouter">
                </form>
            </div>
        </div>
        @endadmin @endauth
    </div>
@endsection
