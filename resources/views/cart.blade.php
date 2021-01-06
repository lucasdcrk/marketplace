@extends('layouts.app')

@section('title', 'Panier')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Panier</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    @if(session()->has('cart.products'))
                        <ul class="list-group list-group-flush">
                            @foreach(session()->get('cart.products') as $product)
                                @php
                                    $product = \App\Models\Product::find($product);
                                @endphp
                                @if($product)
                                    <li class="list-group-item">
                                        <div class="px-2">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="img-fluid" src="https://placehold.it/500" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <strong>
                                                        <a href="{{ route('article.show', $product) }}">{{ $product->name }}</a>
                                                    </strong>
                                                    <p>
                                                        {{ $product->description }}<br>
                                                        <small>Vendu par <a href="{{ route('boutique.show', $product->seller) }}">{{ $product->seller->name }}</a></small>
                                                    </p>
                                                    <h6>{{ $product->price }}€</h6>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <a href="{{ route('cart.remove', $product) }}">Retirer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <hr>
                        <div class="row justify-content-around">
                            <div class="col-md-5">
                                <p>Vous avez {{ count(session()->get('cart.products')) }} articles dans votre panier.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="btn-group float-right">
                                    <a class="btn btn-danger" href="{{ route('cart.empty') }}">Vider le panier</a>
                                    <a class="btn btn-primary" href="{{ route('checkout') }}">Paiement &rarr;</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <h3 class="text-center p-5">Votre panier est vide.</h3>
                            <a href="{{ url('/') }}">&larr; Retour à l'accueil</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
