@extends('layouts.app')

@section('title', 'Panier')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Ajout de produit</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="jumbotron">
                    <form action="{{ route('article.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nom</label>
                            <input class="form-control" type="text" name="name" placeholder="Vase en terre cuite" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" type="text" name="description" placeholder="Magnifique vase fabriqué dans nos ateliers." required>
                        </div>
                        <div class="form-group">
                            <label>Prix (en euros)</label>
                            <input class="form-control" type="number" step="0.01" placeholder="34.99" name="price" required>
                        </div>
                        <button class="btn btn-primary btn-block my-5" type="submit">Ajouter</button>
                        <div class="text-center">
                            <a href="{{ route('article.index') }}">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
