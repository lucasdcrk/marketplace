<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $products = session()->pull('cart.products');

        if (!$products) {
            session()->flash('alert', 'Votre panier est vide.');

            return redirect(route('cart'));
        }

        $sellers = [];

        foreach ($products as $product) {
            $product = Product::find($product);

            if (!in_array($product->seller->id, $sellers)) {
                $sellers[] = $product->seller->id;
            }
        }

        foreach ($sellers as $seller) {
            $user->orders()->create([
                'seller_id' => $seller,
                'products' => json_encode($products),
                'total' => session()->pull('cart.total')
            ]);
        }

        session()->flash('alert', 'Commande effectuée avec succès.');

        return redirect(url('/'));
    }
}
