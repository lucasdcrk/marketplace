<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Marketplace — @yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">
            {{ config('app.name') }}
            —
            @guest
                Visiteur
            @endguest
            @auth
                @if(auth()->user()->type === 'seller')
                    Commerçant
                @else
                    Client
                @endif
            @endauth
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ url('/') }}">Accueil</a>
            <a class="p-2 text-dark" href="{{ route('boutique.index') }}">Boutiques</a>
            @auth
                @if(auth()->user()->type === 'seller')
                    <a class="p-2 text-dark" href="{{ route('article.index') }}">Mes produits</a>
                @else
                    <a class="p-2 text-dark" href="{{ route('orders') }}">Mes commandes</a>
                    <a class="p-2 text-dark" href="{{ route('cart') }}">Panier</a>
                @endif
                <a class="p-2 text-dark" href="{{ route('logout') }}">Déconnexion</a>
            @endauth
            @guest
                <a class="p-2 text-dark" href="{{ route('login') }}">Connexion</a>
            @endguest
        </nav>
        @guest
            <a class="btn btn-outline-primary" href="{{ route('register') }}">Inscription</a>
        @endguest
    </div>

    @if(session()->has('alert'))
        <div class="alert alert-success rounded-0 mb-0" role="alert">
            {{ session()->get('alert') }}
        </div>
    @endif

    @yield('content')
</body>
</html>
