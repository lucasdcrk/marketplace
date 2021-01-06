@extends('layouts.app')

@section('title', 'Commandes')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Commandes</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    @if(count($orders) > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($orders as $order)
                                <li class="list-group-item">
                                    <div class="px-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>
                                                    Commande L{{ $order->id }} — {{ $order->created_at->format('d/m/Y H:i') }}
                                                </strong>
                                                <p>
                                                    {{ count(json_decode($order->products)) }} articles dans cette commande.<br>
                                                </p>
                                                <h6>{{ $order->total }}€</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center">
                            <h3 class="text-center p-5">Aucune commande.</h3>
                            <a href="{{ url('/') }}">&larr; Retour à l'accueil</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
