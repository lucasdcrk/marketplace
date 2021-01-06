@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="py-5 text-center bg-light">
        <h1 class="display-4">{{ config('app.name') }}</h1>
        <p class="lead">Plateforme d'achats en ligne, une sélection de {{ \App\Models\Seller::all()->count() }} commerçants indépendants.</p>
    </div>
    <div class="container my-4">
        <h1 class="text-center">Produits au hasard</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="card-text">
                                {{ $product->description }}
                            </p>
                            <h6>{{ $product->price }}€</h6>
                            <a class="btn btn-primary" href="{{ route('cart.add', $product) }}">Ajouter au panier</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container my-4">
        <h1 class="text-center">Vendeurs au hasard</h1>
        <div class="row">
            @foreach($sellers as $seller)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $seller->name }}</h3>
                            <p class="card-text">
                                {{ $seller->products()->count() }} produits en vente sur cette boutique.
                            </p>
                            <a class="btn btn-primary" href="{{ route('boutique.show', $seller) }}">Visiter &rarr;</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
