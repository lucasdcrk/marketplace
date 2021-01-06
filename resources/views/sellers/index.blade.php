@extends('layouts.app')

@section('title', 'Boutiques')

@section('content')
    <div class="text-center text-white py-4 bg-primary mb-3">
        <h1>Boutiques</h1>
        <p class="mb-0">Nous proposons une sélection de {{ count($sellers) }} vendeurs indépendants.</p>
    </div>

    <div class="container">
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
