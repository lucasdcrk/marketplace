@extends('layouts.app')

@section('title', $seller->name)

@section('content')
    <div class="text-center text-white py-4 bg-dark mb-3">
        <h1>Boutique : {{ $seller->name }}</h1>
        <a class="text-decoration-none" href="{{ route('boutique.index') }}">&larr; Retour aux boutiques</a>
    </div>
    <div class="container">
        <div class="row">
            @foreach($seller->products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="card-text">
                                {{ $product->description }}
                            </p>
                            <h6>{{ $product->price }}€</h6>
                            @auth
                                <a class="btn btn-primary" href="{{ route('cart.add', $product) }}">Ajouter au panier</a>
                            @endauth
                            @guest
                                <a class="btn btn-info" href="{{ route('login') }}">Connexion requise</a>
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
