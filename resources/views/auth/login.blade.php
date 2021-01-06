@extends('layouts.app')

@section('title', 'Panier')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Connexion</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="jumbotron">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" placeholder="maxence@fbi.ovh" required>
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input class="form-control" type="password" name="password" placeholder="**********" required>
                        </div>
                        <button class="btn btn-primary btn-block my-5" type="submit">Connexion</button>
                        <div class="text-center">
                            <a href="{{ route('register') }}">Inscription</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
