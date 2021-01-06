@extends('layouts.app')

@section('title', 'Produits')

@section('content')
    <div class="text-center text-white py-4 bg-info mb-3">
        <h1>Mes produits</h1>
        <a class="text-decoration-none text-white" href="{{ route('article.create') }}">Ajouter un produit</a>
    </div>
    <div class="container">
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
                            <div class="btn-group btn-group-sm">
                                @if(false)
                                <a class="btn btn-primary" href="{{ route('article.edit', $product) }}">Editer</a>
                                @endif
                                <button class="btn btn-danger" onclick="document.getElementById('{{ $product }}-delete').submit()">Supprimer</button>
                            </div>
                            <form id="{{ $product }}-delete" action="{{ route('article.destroy', $product) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
