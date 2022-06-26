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
            <div class="content">
                <h2>Ajouter un produit</h2>
                <form class="form" id="admin" action="{{ route('create.product') }}" method="POST" enctype="multipart/form-data">
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
    </div>
@endsection